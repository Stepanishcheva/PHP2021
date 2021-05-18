<?php

class ComplexNumber {
    /**
     * @var float|int|mixed
     */
    private float $re;
    /**
     * @var float|int|mixed
     */
    private float $im;

    /**
     * ComplexNumber constructor.
     * @param float $re
     * @param float $im
     */
    public function __construct($re=0, $im=0)
    {
        $this->im=$im;
        $this->re=$re;
    }

    /**
     * @param ComplexNumber $elem
     * @return ComplexNumber
     */
    public function add(ComplexNumber $elem): ComplexNumber
    {
        $ans= new ComplexNumber();
        if (get_class($elem)!=ComplexNumber::class){ $elem=new ComplexNumber($elem);}
        $ans->setIm($this->getIm()+$elem->getIm());
        $ans->setRe($this->getRe()+$elem->getRe());
        return $ans;
    }

    /**
     * @param ComplexNumber $elem
     * @return ComplexNumber
     */
    public function sub(ComplexNumber $elem):ComplexNumber
    {
        return new ComplexNumber($this->getRe()-$elem->getRe(),$this->getIm()-$elem->getIm());
    }


    /**
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
     * @param ComplexNumber $elem
     * @return ComplexNumber
     * @throws Exception
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
     * @return float
     */
    public function abs(): float
    {
        $re=$this->re;
        $im=$this->im;
        return(sqrt($im*$im+$re*$re));
    }

    /**
     * @return float
     */
    public function getIm(): float
    {
        return $this->im;
    }

    /**
     * @param float $im
     */
    public function setIm(float $im): void
    {
        $this->im = $im;
    }

    /**
     * @param float $re
     */
    public function setRe(float $re): void
    {
        $this->re = $re;
    }

    /**
     * @return float
     */
    public function getRe(): float
    {
        return $this->re;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->im>=0)
        {
            return $this->re . "+".$this->im . "i";
        }
        else
        {
            return $this->re."".$this->im."i";
        }
    }
}
