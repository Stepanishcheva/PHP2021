<?php
namespace ns;
use Exception;

class Exception3 extends Exception
{
    public function __construct($mess="Exception 3")
    {
        parent::__construct($mess);
    }

}
