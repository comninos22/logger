<?php

namespace Logger\Interfaces;

interface ILogger
{
    function log($data, $topic, $error = null);
    function changeCollection($collection);
}
