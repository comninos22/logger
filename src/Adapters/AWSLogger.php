<?php

namespace Logger\Adapters;

use Logger\Interfaces\IAWSLogger;

class AWSLogger implements IAWSLogger
{
    function log($data, $topic, $error = null)
    {
    }
    function changeCollection($collection)
    {
    }
}
