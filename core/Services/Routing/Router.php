<?php



namespace core\Services\Routing;

use core\interfaces\RouterInterface;

/**
 *
 */
class Router implements RouterInterface
{

    protected $controllerName;
    protected $acctionName;
    protected $controllerClass;
    protected $pathElements = [];

    public function route()
    {
        $this->pathElements = explode('/', $_SERVER['REQUEST_URI']);
        $params = [];

        // print_r($this->pathElements);

        if(count($this->pathElements) >= 3){
            $this->controller = $this->pathElements[1];
            if(!empty($this->pathElements[2])){
                $this->acction = $this->pathElements[2];
            }else{
                $this->acction = 'view';
            }
        }else{
            $this->controller = home;
            $this->acction = view;
        }

        if(count($this->pathElements) > 3){
            $adittionalParams = $this->pathElements;

            // remove route params
            unset($adittionalParams[0]);
            unset($adittionalParams[1]);
            unset($adittionalParams[2]);

            // reset array keys
            $adittionalParams = array_values($adittionalParams);

            // print_r($adittionalParams);

            // parse adittional params
            for ($i=0; $i < count($adittionalParams); $i++) {

                $CurrentKey = $i;
                // echo  '<br>' . !($CurrentKey%2) . $i%2 . '--------'. $i . ' +++ '. ($i+1) . '+++' . $adittionalParams[($i+1)] . !empty($adittionalParams[($CurrentKey+1)]);
                // echo '----'. $adittionalParams[$i+1] .  '<br>';
                if(!($CurrentKey%2) && !empty($adittionalParams[($CurrentKey+1)])){
                    // echo $adittionalParams[$i].'+++++<br>';
                    $params[$adittionalParams[$i]] = $adittionalParams[($i+1)];
                }
            }
        }

        // print_r($params);

        $this->runRoute($params);
    }

    protected function runRoute(array $params){
        $controllerName =  ucfirst(strtolower($this->controller)) . 'Controller';
        $controllerPath =  $_SERVER['DOCUMENT_ROOT'] . '/../app/controllers/';
        $controllerNamespace = '\app\controllers\\';
        $controllerFile = $controllerPath . $controllerName . '.php';
        $actionName = strtolower($this->acction) . 'Action';

        if( file_exists($controllerFile)){
            include $controllerFile;
            //full class name (with namespace)
            $className = $controllerNamespace . $controllerName;

            $this->controllerClass = new $className();

            $reflect = new \ReflectionClass($className);

            if($reflect->hasMethod($actionName)){
                $ActionMethod = $reflect->getMethod($actionName);

                $this->runAction($className,$ActionMethod,$params);
            }else{
                echo 'page not found';
            }


            // print_r($reflect->getMethods());
        }else{
            http_response_code(404);
        }
    }

    protected function runAction($className,$ActionMethod,$params){

        $parameters = $ActionMethod->getParameters();

        $reflect = new \ReflectionClass($className);

        $paramsToAction = [];
        $checkRequired = true;

        foreach ($parameters as $key => $parameter) {
            // print_r($params);
            if(empty($params[$parameter->name]) && !$parameter->isDefaultValueAvailable()){
                $checkRequired = false;
                echo 'missing required params' . $parameter->name;
            }else if(!empty($params[$parameter->name])){
                $paramsToAction[$parameter->name] = $params[$parameter->name];
            }

            if(!$parameter->isDefaultValueAvailable()){
                $requiredParams[] = $parameter->name;
            }
        }

        if($checkRequired){
            $ActionMethod->invokeArgs($this->controllerClass,$paramsToAction);
        }
    }

}