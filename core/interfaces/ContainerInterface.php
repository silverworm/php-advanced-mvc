<?php



namespace core\interfaces;


/**
 * Interface ContainerInterface
 * @package core\interfaces
 */
interface ContainerInterface
{
    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function has();
}