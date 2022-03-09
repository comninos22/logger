<?php

namespace Logger;

use Logger\Adapters\TextLogger;
use Logger\Adapters\DBLogger;
use Logger\Adapters\FileStoreLogger;
use Logger\Adapters\AWSLogger;
use Logger\Interfaces\ILoggerFacade;
use Logger\Interfaces\ILogger;

class GeneralLogger implements ILoggerFacade
{
    public ILogger $logger;

    function __construct($type, $collection)
    {
        $this->setLogger($type, $collection);
    }
    function log($data, $topic, $error = 0)
    {
        $this->logger->log($data, $topic, $error);
    }
    private function loggerFactory($type, $collection)
    {
        switch ($type) {
            case "txt":
                return new TextLogger($collection);
            case "sql":
                return new DBLogger($collection);
            case "filestore":
                return new FileStoreLogger($collection);
            case "aws":
                return new AWSLogger($collection);
            default:
                throw new \Exception("Invalid logger type");
        }
    }
    function setLogger($type, $collection)
    {
        $this->logger = $this->loggerFactory($type, $collection);
    }
    function setCollection($name)
    {
        $this->logger->changeCollection($name);
    }
}
