<?php
use ns as ns;
spl_autoload_register(function ($class_name) {
    require_once $class_name.'.php';
});
class MyClass{
    public function func1(){
        echo "Function 1 ";
       $this->throwExceptions();
    }
    public function func2(){
        echo "Function 2 ";
        $this->throwExceptions();
    }
    public function func3(){
        echo "Function 3 ";
        $this->throwExceptions();
    }
    public function func4(){
        echo "Function 4 ";
        $this->throwExceptions();
    }
    private function throwExceptions(){
        $i1=rand(0,4);
        $i2=rand(0,4);
        while ($i2==$i1) $i2=rand(0,4);
        if (rand(0, 1)) {
            $this->chooseExc($i1);
        }
        else {
            $this->chooseExc($i2);
        }
    }
    private function chooseExc($num){
        switch ($num){
            case 0:
                throw new ns\Exception1();
            case 1:
                throw new ns\Exception2();
            case 2:
                throw new ns\Exception3();
            case 3:
                throw new ns\Exception4();
            case 4:
                throw new ns\Exception5();
        }
    }
}

