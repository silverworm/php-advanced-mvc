<?php



namespace core\Services\Routing;

use core\interfaces\RouterParamsBuilderInterface;

/**
 *
 */
class RouterParamsBuilder implements RouterParamsBuilderInterface
{

    $arguments = [];

    function __construct(array $arguments)
    {
        $this->arguments = $arguments;
    }

    public function param_1();

    public function callMethod();
}
