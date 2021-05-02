<?php
require_once("LoggerPSR3.php");

class Test
{
    public string $message;
    public string $type;
    public function __construct($message, $type)
    {
        $this->message=$message;
        $this->type=$type;
        $this->check();
    }

    private function check()
    {
        $log=new LoggerPSR3();
        switch ($this->type)
        {
            case 'emergency':
                $log->emergency($this->message);
                break;
            case 'alert' :
                $log->alert($this->message);
                break;
            case 'debug' :
                $log->debug($this->message);
                break;
            case 'info' :
                $log->info($this->message);
                break;
            case 'notice':
                $log->notice($this->message);
                break;
            case 'warning':
                $log->warning($this->message);
                break;
            case 'critical' :
                $log->critical($this->message);
                break;
            case 'error':
                $log->error($this->message);
                break;
        }
    }
}
