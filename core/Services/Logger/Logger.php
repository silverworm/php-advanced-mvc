<?php



namespace core\Services\Logger;

use core\interfaces\WriterInterface;
use Psr\Log\LoggerInterface;


/**
 * Class Logger
 * @package core\Services\Logger
 */
class Logger implements LoggerInterface
{
    /**
     * @var WriterInterface
     */
    public $writer;

    /**
     * Logger constructor.
     * @param WriterInterface $writer
     */
    function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function emergency($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function alert($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function critical($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function error($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function warning($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function notice($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function info($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function debug($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        return $this->$level($message, $context);
    }
}