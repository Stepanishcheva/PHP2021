<?php
namespace ns;
use Exception;

class Exception4 extends Exception
{

    public function __construct()
    {
        parent::__construct("Exception 4");
    }

}