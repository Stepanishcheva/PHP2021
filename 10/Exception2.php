<?php
namespace  ns;
use Exception;

class Exception2 extends Exception
{
    public function __construct()
    {
        parent::__construct("Exception 2");
    }

}