<?php
namespace ns;
use Exception;
class Exception1 extends Exception
{
    public function __construct($mess = "Exception 1")
    {
        parent::__construct($mess);
    }

}
