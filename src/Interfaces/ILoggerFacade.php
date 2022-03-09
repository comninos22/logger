<?php

namespace Logger\Interfaces;

interface ILoggerFacade
{
    function setLogger($type, $collection);
    function setCollection($collection);
    function log($data, $topic, $error);
}
