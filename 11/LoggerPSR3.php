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
    private function writeLog($level,$message)
    {
        $json=$this->getJSON($level,$message);
        $logFileName='logfile.txt';
        $f=fopen($logFileName, "w");
        fwrite($f,$json."\n");
        fclose($f);
    }

    public function emergency($message, array $context = array())
    {
        $this->writeLog(LogLevel::EMERGENCY,$message);
    }

    public function alert($message, array $context = array())
    {
        $this->writeLog(LogLevel::ALERT,$message);
    }

    public function critical($message, array $context = array())
    {
        $this->writeLog(LogLevel::CRITICAL,$message);
    }

    public function error($message, array $context = array())
    {
        $this->writeLog(LogLevel::ERROR,$message);
    }

    public function warning($message, array $context = array())
    {
        $this->writeLog(LogLevel::WARNING,$message);
    }

    public function notice($message, array $context = array())
    {
        $this->writeLog(LogLevel::NOTICE,$message);
    }

    public function info($message, array $context = array())
    {
        $this->writeLog(LogLevel::INFO,$message);
    }

    public function debug($message, array $context = array())
    {
        $this->writeLog(LogLevel::DEBUG,$message);
    }

    public function log($level, $message, array $context = array())
    {
        $this->writeLog($level,$message);
    }

}

