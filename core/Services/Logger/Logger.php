<?php



namespace core\Services\Logger;

use core\interfaces\WriterInterface;
use Psr\Log\LoggerInterface;


class Logger implements LoggerInterface
{
    public $writer;

    function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function emergency($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function alert($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function critical($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function error($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function warning($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function notice($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function info($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function debug($message, array $context = array())
    {
        $this->writer->write($message,$context);
    }

    public function log($level, $message, array $context = array())
    {
        return $this->$level($message, $context);
    }
}