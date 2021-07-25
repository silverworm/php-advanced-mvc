<?php



namespace core\interfaces;


/**
 * Interface WriterInterface
 * @package core\interfaces
 */
interface WriterInterface
{

    /**
     * @param $message
     * @param array $context
     * @return mixed
     */
    public function write($message, array $context);

}