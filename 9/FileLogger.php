<?php
require_once ('Logger.php');
class FileLogger extends Logger{
    public $string;
    public $file;

    public function __construct($string, $fileName){
        $this->string=$string;
        $this->file = fopen($fileName, "a");
    }


    public function write(){
        $ans=$this->getAnswer($this->string);
        fwrite($this->file, $ans);

    }


    public function __destruct(){
        fclose($this->file);
    }
}

