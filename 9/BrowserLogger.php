<?php
require_once('Logger.php');
class BrowserLogger extends Logger{
    public $string;
    public $option;

    public function __construct($string,$option){
       $this->string=$string;
       $this->option=$option;
    }

    public function write(){
        date_default_timezone_set('Europe/Moscow');
        if (($this->option)=='t'){
            echo date('H-i').':  ';
        }
        if(($this->option)=='dt'){
            echo date('H-i  j M Y ').':  ';
        }
        echo $this->getAnswer($this->string);

    }
}
