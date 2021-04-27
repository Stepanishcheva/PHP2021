<?php
namespace  ns;
require_once('Exception1.php');

class Exception2 extends Exception1
{
    public function __construct()
    {
        parent::__construct("Exception 2");
    }

}