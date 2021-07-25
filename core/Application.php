<?php



namespace core;

use core\interfaces\RunnableInterface;
use core\interfaces\ContainerInterface;
use core\Services\Routing\Router;

/**
 *
 */
class Application implements RunnableInterface,ContainerInterface
{

    /**
     * @throws \ReflectionException
     */
    public function run()
    {
        echo 'test-test - Allworking' . '<br>';
        $router = new Router;

        echo $router->route();
    }

    /**
     * @return mixed|void
     */
    public function get()
    {

    }

    /**
     * @return mixed|void
     */
    public function has()
    {

    }
}