<?php
namespace Logger;

interface ILogger
{
    function log($data, $topic, $error = null);
    function changeCollection($collection);
}
