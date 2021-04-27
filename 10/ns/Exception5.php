<?php
namespace ns;
use Exception;
class Exception5 extends Exception{
    public function __construct() {
        parent::__construct("Exception 5");
    }


}