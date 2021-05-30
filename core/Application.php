<?php



namespace core;

use core\contracts\RunnableInterface;
use core\contracts\ContainerInterface;

/**
 *
 */
class Application implements RunnableInterface,ContainerInterface
{

    public function run()
    {
        echo 'test-test - Allworking';
    }

    public function get()
    {

    }

    public function has()
    {

    }
}