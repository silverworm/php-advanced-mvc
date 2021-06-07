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

    public function run()
    {
        echo 'test-test - Allworking' . '<br>';
        $router = new Router;

        echo $router->route();
    }

    public function get()
    {

    }

    public function has()
    {

    }
}