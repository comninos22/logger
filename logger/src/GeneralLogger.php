<?php

namespace Logger;


class GeneralLogger implements ILoggerFacade
{
    public ILogger $logger;

    function __construct($type, $collection)
    {
        $this->setCollection($collection);
        $this->setLogger($type);
    }
    function log($data, $topic, $error = 0)
    {
        $this->logger->log($data, $topic, $error);
    }
    private function loggerFactory($type)
    {
        switch ($type) {
            case "text":
                return new TextLogger($this->collection);
            case "sql":
                return new DBLogger($this->collection);
            case "filestore":
                return new FileStoreLogger($this->collection);
            case "aws":
                return new AWSLogger($this->collection);
        }
    }
    function setLogger($type)
    {
        $this->logger = $this->loggerFactory($type);
    }
    function setCollection($name)
    {
        $this->logger->changeCollection($name);
    }
}
