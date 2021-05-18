<?php
require_once 'ComplexNumber.php';
use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase {

    protected $cnOnlyRe;
    protected $cnFrom1Numb;
    protected $cnOnlyIm;
    protected $cn0;
    protected $cnBig;
    protected $cnSmall;
    protected $BAddS;
    protected $BDivS;
    protected $BSubS;
    protected $absBig;
    protected $cnNeg;
    protected $BAddNeg;
    protected $BSubNeg;
    protected $BMultS;
    protected $BMultNeg;
    protected $BAddRe;
    protected $BAddIm;
    protected $BDivRe;
    protected $BDivIm;
    protected $BMultIm;
    protected $BMultRe;
    protected $BSubRe;
    protected $BSubIm;
    protected $BDivNeg;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cnOnlyRe=new ComplexNumber(2,0);
        $this->cnFrom1Numb=new ComplexNumber(2,0);
        $this->cnOnlyIm=new ComplexNumber(0,2);
        $this->cn0=new ComplexNumber();
        $this->cnBig=new ComplexNumber(5,2);
        $this->cnSmall= new ComplexNumber(1,2);
        $this->cnNeg=new ComplexNumber(-3,-1);
        $this->BAddS=new ComplexNumber(6,4);
        $this->BDivS=new ComplexNumber(1.8, -1.6);
        $this->BSubS=new ComplexNumber(4,0);
        $this->absBig=sqrt(29);
        $this->BAddNeg=new ComplexNumber(2,1);
        $this->BSubNeg=new ComplexNumber(8,3);
        $this->BMultS=new ComplexNumber(1,12);
        $this->BMultNeg=new ComplexNumber(-13,-11);
        $this->BAddRe=new ComplexNumber(7,2);
        $this->BAddIm=new ComplexNumber(5,4);
        $this->BDivRe=new ComplexNumber(2.5,1);
        $this->BDivIm=new ComplexNumber(1,-2.5);
        $this->BMultIm=new ComplexNumber(-4,10);
        $this->BMultRe=new ComplexNumber(10,4);
        $this->BSubRe=new ComplexNumber(3,2);
        $this->BSubIm=new ComplexNumber(5,0);
        $this->BDivNeg=new ComplexNumber(-1.7,-0.1);
    }

    public function testConstructorWith1Arg()
    {
        $this->assertEquals($this->cnFrom1Numb,$this->cnOnlyRe);
    }

    public function testAddComplexNumber()
    {
        $this->assertEquals($this->BAddS, $this->cnBig->add($this->cnSmall));
    }
    public function testAdd0()
    {
        $this->assertEquals($this->cnBig, $this->cnBig->add($this->cn0));
    }
    public function testAddNeg()
    {
        $this->assertEquals($this->BAddNeg, $this->cnBig->add($this->cnNeg));
    }
    public function testAddRe()
    {
        $this->assertEquals($this->BAddRe, $this->cnBig->add($this->cnOnlyRe));
    }
    public function testAddIm()
    {
        $this->assertEquals($this->BAddIm, $this->cnBig->add($this->cnOnlyIm));
    }
    public function testSubComplexNumber()
    {
        $this->assertEquals($this->BSubS, $this->cnBig->sub($this->cnSmall));
    }
    public function testSub0()
    {
        $this->assertEquals($this->cnSmall, $this->cnSmall->sub($this->cn0));
    }
    public function testSubNeg()
    {
        $this->assertEquals($this->BSubNeg, $this->cnBig->sub($this->cnNeg));
    }
    public function testSubRe()
    {
        $this->assertEquals($this->BSubRe, $this->cnBig->sub($this->cnOnlyRe));
    }
    public function testSubIm()
    {
        $this->assertEquals($this->BSubIm, $this->cnBig->sub($this->cnOnlyIm));
    }
    public function testMultWithComplexNumber()
    {
        $this->assertEquals($this->BMultS, $this->cnBig->mult($this->cnSmall));
    }
    public function testMultWith0()
    {
        $this->assertEquals($this->cn0, $this->cnBig->mult($this->cn0));
    }
    public function testMultWithNeg()
    {
        $this->assertEquals($this->cn0, $this->cnBig->mult($this->cn0));
    }
    public function testMultWithRe()
    {
        $this->assertEquals($this->BMultRe, $this->cnBig->mult($this->cnOnlyRe));
    }
    public function testMultWithIm()
    {
        $this->assertEquals($this->BMultIm, $this->cnBig->mult($this->cnOnlyIm));
    }
    public function testDivWithComplexNumber()
    {
        $this->assertEquals($this->BDivS, $this->cnBig->div($this->cnSmall));
    }
    function testDivZero()
    {
        try {
            $this->cnBig->div($this->cn0);
        } catch (\Exception $e) {
            $this->assertSame('Div by zero', $e->getMessage());
            return;
        }
        $this->fail('Exception was not thrown.');
    }
    public function testDivNeg()
    {
        $this->assertEquals($this->BDivNeg, $this->cnBig->div($this->cnNeg));
    }
    public function testDivRe()
    {
        $this->assertEquals($this->BDivRe, $this->cnBig->div($this->cnOnlyRe));
    }
    public function testDivIm()
    {
        $this->assertEquals($this->BDivIm, $this->cnBig->div($this->cnOnlyIm));
    }



    public function testAbs()
    {
        $this->assertEquals($this->absBig,$this->cnBig->abs());
    }
    public function testAbsNeg()
    {
        $this->assertEquals(sqrt(10),$this->cnNeg->abs());
    }

    public function testAbsOnlyRe()
    {
        $this->assertEquals(2,$this->cnOnlyRe->abs());
    }
    public function testAbsOnlyIm()
    {
        $this->assertEquals(2,$this->cnOnlyIm->abs());
    }
    public function testAbsZero()
    {
        $this->assertEquals(0,$this->cn0->abs());
    }

}
