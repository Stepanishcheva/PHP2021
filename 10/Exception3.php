<?php
namespace ns;
use Exception;

class Exception3 extends Exception
{
    public function __construct()
    {
        parent::__construct("Exception 3");
    }

}