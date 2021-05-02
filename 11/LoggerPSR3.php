<?php
use Psr\Log\LogLevel;
use Psr\Log\LoggerInterface;

spl_autoload_register(function ($class_name) {
    require_once "vendor\psr\log\\".$class_name.'.php';
});

class LoggerPSR3 implements LoggerInterface
{
    private  function getJSON($level,$message)
    {
        date_default_timezone_set('Europe/Moscow');
        $d=date('H-i  j M Y ');
        $ans=array(
            'Тип записи' => $level,
            'Время записи' => $d,
            'Содержимое' => $message,
        );
        $json = json_encode($ans, JSON_UNESCAPED_UNICODE);
        return $json;
    }
    private function writeLog($json)
    {
        $logFileName='logfile.txt';
        $f=fopen($logFileName, "a");
        fwrite($f,$json."\n");
        fclose($f);
    }

    public function emergency($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::EMERGENCY,$message));
    }

    public function alert($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::ALERT,$message));
    }

    public function critical($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::CRITICAL,$message));
    }

    public function error($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::ERROR,$message));
    }

    public function warning($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::WARNING,$message));
    }

    public function notice($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::NOTICE,$message));
    }

    public function info($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::INFO,$message));
    }

    public function debug($message, array $context = array())
    {
        $this->writeLog($this->getJSON(LogLevel::DEBUG,$message));
    }

    public function log($level, $message, array $context = array())
    {
        $this->writeLog($this->getJSON($level,$message));
    }

}

