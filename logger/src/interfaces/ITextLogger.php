<?php

namespace Logger;

interface ITextLogger extends ILogger
{
    function setFilenameConvention($type);
}
