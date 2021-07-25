<?php



namespace core\Services\Writer;

use core\interfaces\WriterInterface;

/**
 * Class FileWriter
 * @package core\Services\Writer
 */
class FileWriter implements WriterInterface
{
    /**
     * @var string
     */
    public $filePath;

    /**
     * FileWriter constructor.
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $_SERVER['DOCUMENT_ROOT'] . '/../fileLogs/' . $filePath;
    }

    /**
     * @param $message
     * @param array $context
     * @return mixed|void
     */
    public function write($message, array $context)
    {
        $logLine = "\r\n" . print_r($message,true) . ' ' . print_r($context,true);

        // TODO: Implement write() method.
        $result = file_put_contents($this->filePath.'.txt', $logLine, FILE_APPEND);

    }
}