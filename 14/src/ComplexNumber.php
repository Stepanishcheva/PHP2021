<?php

class ComplexNumber {
    /**
     * @var float|int
     */
private $re;
    /**
     * @var float|int
     */
private  $im;

    /**
     * ComplexNumber constructor.
     * Accepts two numbers as input. If the constructor is empty, a complex number of 0 is created.
     * The omitted argument is equal to zero.
     * @param float $re
     * @param float $im
     */
public function __construct($re=0, $im=0)
    {
        $this->im=$im;
        $this->re=$re;
    }

    /**
     * Add a function.
     * Call the add function for a complex number, which takes a complex number as input,to return the result of the addition.
     * res=(re1+re2)+i*(im1+im2)
     * None of the original numbers will be changed.
     * @param ComplexNumber $elem
     * @return ComplexNumber
     */
public function add(ComplexNumber $elem):ComplexNumber
    {
        $ans= new ComplexNumber();
        if (get_class($elem)!=ComplexNumber::class){ $elem=new ComplexNumber($elem);}
        $ans->setIm($this->getIm()+$elem->getIm());
        $ans->setRe($this->getRe()+$elem->getRe());
        return $ans;
    }

    /**
     * Subtraction function.
     * Call the sub function for a complex number, which takes a complex number as input, to return the subtraction result.
     * res=(re1-re2)+i*(im1-im2)
     * None of the original numbers will be changed.
     * @param ComplexNumber $elem
     * @return ComplexNumber
     */
    public function sub(ComplexNumber $elem):ComplexNumber
    {
        return new ComplexNumber($this->getRe()-$elem->getRe(),$this->getIm()-$elem->getIm());
    }


    /**
     * Multiplication function.
     * Call the sub function for a complex number, which takes a complex number as input, to return the multiplication result.
     * res=(re1*re2-im1*im2)+i*(re1*im2+re2*im1)
     * None of the original numbers will be changed.
     * @param ComplexNumber $elem
     * @return ComplexNumber
     */
    public function mult(ComplexNumber $elem):ComplexNumber
    {
        $re1=$this->getRe();
        $re2=$elem->getRe();
        $im1=$this->getIm();
        $im2=$elem->getIm();
        return new ComplexNumber($re1*$re2-$im1*$im2,$re1*$im2+$re2*$im1);
    }

    /**
     * Division function
     * Call the sub function for a complex number, which takes a complex number as input, to return the division result.
     * res=((re1*re2+im1*im2)/(im2*im2+re2*re2))+ i*((im1*re2-re1*im2)/(im2*im2+re2*re2))
     * None of the original numbers will be changed.
     * If the number 0 is passed an exception is thrown
     * @param ComplexNumber $elem
     * @return ComplexNumber
     * @throws Exception "Div by zero"
     */
    public function div(ComplexNumber $elem):ComplexNumber
    {
        $re1=$this->getRe();
        $re2=$elem->getRe();
        $im1=$this->getIm();
        $im2=$elem->getIm();
        $d=$im2*$im2+$re2*$re2;
        if ($d==0)
        {
            throw new Exception("Div by zero");
        }
        return new ComplexNumber(($re1*$re2+$im1*$im2)/$d,($im1*$re2-$re1*$im2)/$d);
    }

    /**
     * Modulus of a complex number
     * sqrt(im^2+re^2)
     * @return float
     */
    public function abs(): float
    {
        $re=$this->re;
        $im=$this->im;
        return(sqrt($im*$im+$re*$re));
    }

    /**
     * Returns the imaginary part of a given complex number
     * @return float
     */
    public function getIm(): float
    {
        return $this->im;
    }

    /**
     * Change the imaginary part of a given complex number
     * @param float $im
     */
    public function setIm(float $im): void
    {
        $this->im = $im;
    }

    /**
     * Change the real part of a given complex number
     * @param float $re
     */
    public function setRe(float $re): void
    {
        $this->re = $re;
    }

    /**
     * Returns the real part of a given complex number
     * @return float
     */
    public function getRe(): float
    {
        return $this->re;
    }

    /**
     * String representation of a complex number
     * @return string
     */
    public function __toString(): string
    {
        if (($this->getRe()==0)&&($this->getIm()==0)) return '0';
        $str='';
        if ($this->getRe()!=0){$str=$this->getRe();}
        if ($this->im>0)
        {
            $str=$str. "+".$this->im . "*i";
        }
        else
        {
            if ($this->im!=0) $str=$str."".$this->im."i";
        }
        return $str;
    }
}
