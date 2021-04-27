<?php
namespace ns;
require_once ('Exception3.php');

class Exception4 extends Exception3
{

    public function __construct()
    {
        parent::__construct("Exception 4");
    }

}
