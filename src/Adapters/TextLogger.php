<?php

namespace Logger\Adapters;

use Logger\Interfaces\ITextLogger;
use Logger\Constants\TextConstants;

class TextLogger implements ITextLogger
{
    public $logPath;
    public $naming;
    public $basepath;
    function __construct($logFolder)
    {
        $this->setLogFolder($logFolder);
        $this->setFilenameConvention("daily");
        $this->basepath = TextConstants::PATH;
    }
    function log($data, $topic, $e = 0)
    {
        $this->createFolderIfNotExists();
        if (!is_array($data)) {
            $data = ['message' => $data];
        }
        $s = "[" . date("H:i:s") . "] [$topic] [$e]";
        while (strlen($s) < 40) {
            $s .= " ";
        }
        
        file_put_contents($this->getFullPath() . $this->filename, $s .  json_encode($data)  . PHP_EOL, FILE_APPEND);
    }
    public function changeCollection($s)
    {
        $this->setLogFolder($s);
    }
    private function setLogFolder($s)
    {
        $this->logPath = $s;
    }
    public function setFilenameConvention($type)
    {
        switch ($type) {
            case "daily":
                $this->setFilename(date("Y_m_d"));
                break;
            case "monthly":
                $this->setFilename(date("Y_m"));
                break;
            case "hourly":
                $this->setFilename(date("Y_m_d_H"));
        }
    }
    private function setFilename($s)
    {
        $this->filename = $s . ".log";
    }
    private function createFolderIfNotExists()
    {
        echo $this->getFullPath();
        if (!file_exists($this->getFullPath())) {
            mkdir($this->getFullPath(), 0777, true);
        }
    }
    private function getFullPath()
    {
        return '/' . $this->trim($this->basepath) . '/' . $this->trim($this->logPath) . '/';
    }
    private function trim($s)
    {
        return trim($s, "/");
    }
}
