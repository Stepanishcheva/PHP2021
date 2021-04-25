<?php
namespace ns;
use Exception;
class Exception1 extends Exception
{
    public function __construct()
    {
        parent::__construct("Exception 1");
    }

}