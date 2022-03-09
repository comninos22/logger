<?php
namespace Logger\Adapters;
use Logger\Interfaces\IDBLogger;

class DBLogger implements IDBLogger
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
