<?php



namespace core\Services\Routing;

use core\interfaces\RouterParamsBuilderInterface;

/**
 * Class RouterParamsBuilder
 * @package core\Services\Routing
 */
class RouterParamsBuilder implements RouterParamsBuilderInterface
{
    /**
     * @var array
     */
    public $arguments = [];

    /**
     * RouterParamsBuilder constructor.
     * @param array $arguments
     */
    function __construct(array $arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @return mixed|void
     */
    public function param_1()
    {
        // TODO: Implement param_1() method.
    }

    /**
     * @return mixed|void
     */
    public function callMethod()
    {
        // TODO: Implement callMethod() method.
    }
}
