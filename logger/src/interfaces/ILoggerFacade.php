<?php
namespace Logger;

interface ILoggerFacade
{
    function setLogger($type);
    function setCollection($collection);
    function log($data, $topic, $error);
}
