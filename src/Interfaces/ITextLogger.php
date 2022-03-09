<?php

namespace Logger\Interfaces;

interface ITextLogger extends ILogger
{
    function setFilenameConvention($type);
}
