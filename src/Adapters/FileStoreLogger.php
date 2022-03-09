<?php

namespace Logger\Adapters;
use Logger\Interfaces\IFileStoreLogger;

class FileStoreLogger implements IFileStoreLogger
{
    function __construct()
    {
    }
    function log($data, $topic, $error = null)
    {
    }
    function changeCollection($collection)
    {
    }
}
