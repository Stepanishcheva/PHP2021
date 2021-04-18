<?php
abstract class Logger
{
    public abstract function write();

    public function getAnswer($str):string{
        $ans='Строка [ '.$str.' ]';
        if (strcmp($str, strtolower($str))==0){
            $ans.=' не';
        }
        $ans.= " содержит заглавные буквы \n";
        return $ans;
    }
}
