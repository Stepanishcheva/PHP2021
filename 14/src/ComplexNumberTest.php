<?php
require_once 'ComplexNumber.php';
use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase {
    /**
     * Complex number with only real part
     * @var ComplexNumber
     */
    protected ComplexNumber $cnOnlyRe;
    /**
     * Complex number constructed from one number
     * @var ComplexNumber
     */
    protected ComplexNumber $cnFrom1Numb;

    /**
     * Complex number with only imaginary part
     * @var ComplexNumber
     */
    protected ComplexNumber $cnOnlyIm;

    /**
     * Complex number equals 0
     * @var ComplexNumber
     */
    protected ComplexNumber $cn0;

    /**
     * Complex number, bigger than cnSmall
     * @var ComplexNumber
     */
    protected ComplexNumber $cnBig;
    /**
     * Complex number, smaller than cnBig
     * @var ComplexNumber
     */
    protected ComplexNumber $cnSmall;

    /**
     * Expected result of adding two complex numbers (cnBig+cnSmall)
     * @var ComplexNumber
     */
    protected ComplexNumber $BAddS;

    /**
     * Expected result of dividing two complex numbers (cnBig/cnSmall)
     * @var ComplexNumber
     */
    protected ComplexNumber $BDivS;

    /**
     * Expected result of subtracting two complex numbers (cnBig-cnSmall)
     * @var ComplexNumber
     */
    protected ComplexNumber $BSubS;
    /**
     * Expected modulus of a complex number cnBig
     * @var float
     */
    protected float $absBig;


    /**
     * Complex number with negative real part and negative imaginary part
     * @var ComplexNumber
     */
    protected ComplexNumber $cnNeg;

    /**
     * Expected result of adding two complex numbers (cnBig+cnNeg)
     * @var ComplexNumber
     */
    protected ComplexNumber $BAddNeg;

    /**
     * Expected result of subtracting two complex numbers (cnBig-cnNeg)
     * @var ComplexNumber
     */
    protected ComplexNumber $BSubNeg;

    /**
     * Expected result of multiplying two complex numbers (cnBig*cnSmall)
     * @var ComplexNumber
     */
    protected ComplexNumber $BMultS;

    /**
     * Expected result of multiplying two complex numbers (cnBig*cnNeg)
     * @var ComplexNumber
     */
    protected ComplexNumber $BMultNeg;

    /**
     * Expected result of adding complex number with complex number with only real part (cnBig+cnOnlyRe)
     * @var ComplexNumber
     */
    protected ComplexNumber $BAddRe;


    /**
     * Expected result of adding complex number with complex number with only imaginary part (cnBig+cnOnlyRe)
     * @var ComplexNumber
     */
    protected ComplexNumber $BAddIm;
    /**
     * Expected result of dividing complex numbers by complex number with only real part (cnBig+cnOnlyRe)
     * @var ComplexNumber
     */
    protected ComplexNumber $BDivRe;

    /**
     * Expected result of dividing complex numbers by complex number with only imaginary part (cnBig/cnOnlyIm)
     * @var ComplexNumber
     */
    protected ComplexNumber $BDivIm;

    /**
     * Expected result of multiplying a complex number by complex number with only imaginary part (cnBig*cnOnlyIm)
     * @var ComplexNumber
     */
    protected ComplexNumber $BMultIm;

    /**
     * Expected result of multiplying a complex number by complex number with only real part (cnBig*cnOnlyRe)
     * @var ComplexNumber
     */
    protected ComplexNumber $BMultRe;

    /**
     * Expected result of subtracting two complex numbers (cnBig-cnOnlyRe)
     * @var ComplexNumber
     */
    protected ComplexNumber $BSubRe;

    /**
     * Expected result of subtracting two complex numbers (cnBig-cnOnlyIm)
     * @var ComplexNumber
     */
    protected ComplexNumber $BSubIm;

    /**
     * Expected result of dividing complex numbers by complex number with negative imaginary and real part (cnBig/cnOnlyIm)
     * @var ComplexNumber
     */
    protected ComplexNumber $BDivNeg;

    /**
     * The function that is run before the test is run.
     */
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

    /**
     * Testing a constructor with 1 parameter
     */
    public function testConstructorWith1Arg()
    {
        $this->assertEquals($this->cnFrom1Numb,$this->cnOnlyRe);
    }

    /**
     * Testing the addition two complex numbers (cnBig+cnSmall)
     */
    public function testAddComplexNumber()
    {
        $this->assertEquals($this->BAddS, $this->cnBig->add($this->cnSmall));
    }

    /**
     * Testing the complex number and zero addition function
     */
    public function testAdd0()
    {
        $this->assertEquals($this->cnBig, $this->cnBig->add($this->cn0));
    }

    /**
     * Testing the complex number and complex number with negative parts addition function
     */
    public function testAddNeg()
    {
        $this->assertEquals($this->BAddNeg, $this->cnBig->add($this->cnNeg));
    }

    /**
     * Testing the complex number and complex number with only real part addition function
     */
    public function testAddRe()
    {
        $this->assertEquals($this->BAddRe, $this->cnBig->add($this->cnOnlyRe));
    }

    /**
     * Testing the complex number and complex number with only imaginary part addition function
     */
    public function testAddIm()
    {
        $this->assertEquals($this->BAddIm, $this->cnBig->add($this->cnOnlyIm));
    }

    /**
     * Testing the function of subtracting complex number from another complex number
     */
    public function testSubComplexNumber()
    {
        $this->assertEquals($this->BSubS, $this->cnBig->sub($this->cnSmall));
    }

    /**
     * Testing the function of subtracting 0 from a complex number
     */
    public function testSub0()
    {
        $this->assertEquals($this->cnSmall, $this->cnSmall->sub($this->cn0));
    }


    /**
     * Testing the function of subtracting a complex number with negative parts from a complex number
     */
    public function testSubNeg()
    {
        $this->assertEquals($this->BSubNeg, $this->cnBig->sub($this->cnNeg));
    }

    /**
     * Testing the function of subtracting a complex number with only real parts from a complex number
     */
    public function testSubRe()
    {
        $this->assertEquals($this->BSubRe, $this->cnBig->sub($this->cnOnlyRe));
    }

    /**
     * Testing the function of subtracting a complex number with only imaginary parts from a complex number
     */
    public function testSubIm()
    {
        $this->assertEquals($this->BSubIm, $this->cnBig->sub($this->cnOnlyIm));
    }


    /**
     * Testing the function of multiplying a complex number by a complex number
     */
    public function testMultWithComplexNumber()
    {
        $this->assertEquals($this->BMultS, $this->cnBig->mult($this->cnSmall));
    }

    /**
     * Testing the function of multiplying a complex number by zero
     */
    public function testMultWith0()
    {
        $this->assertEquals($this->cn0, $this->cnBig->mult($this->cn0));
    }
    /**
     * Testing the function of multiplying a complex number by a complex number with negative parts
     */
    public function testMultWithNeg()
    {
        $this->assertEquals($this->cn0, $this->cnBig->mult($this->cn0));
    }

    /**
     * Testing the function of multiplying a complex number by a complex number with only real parts (cnBig/cnOnlyRe)
     */
    public function testMultWithRe()
    {
        $this->assertEquals($this->BMultRe, $this->cnBig->mult($this->cnOnlyRe));
    }

    /**
     * Testing the function of multiplying a complex number by a complex number with imaginary parts (cnBig/cnOnlyIm)
     */
    public function testMultWithIm()
    {
        $this->assertEquals($this->BMultIm, $this->cnBig->mult($this->cnOnlyIm));
    }

    /**
     * Testing the function of dividing a complex number by complex number(cnBig/cnSmall)
     */
    public function testDivWithComplexNumber()
    {
        $this->assertEquals($this->BDivS, $this->cnBig->div($this->cnSmall));
    }

    /**
     * Testing the function of dividing a complex number by complex number(cnBig/0)
     */
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

    /**
     * Testing the function of dividing a complex number by complex number with negative parts (cnBig/cnNeg)
     */
    public function testDivNeg()
    {
        $this->assertEquals($this->BDivNeg, $this->cnBig->div($this->cnNeg));
    }

    /**
     * Testing the function of dividing a complex number by complex number with only real part (cnBig/cnOnlyRe)
     */
    public function testDivRe()
    {
        $this->assertEquals($this->BDivRe, $this->cnBig->div($this->cnOnlyRe));
    }
    /**
     * Testing the function of dividing a complex number by complex number with only imaginary part (cnBig/cnOnlyRe)
     */
    public function testDivIm()
    {
        $this->assertEquals($this->BDivIm, $this->cnBig->div($this->cnOnlyIm));
    }


    /**
     * Testing the module function of a complex number
     */
    public function testAbs()
    {
        $this->assertEquals($this->absBig,$this->cnBig->abs());
    }

    /**
     * Testing the module function of a complex number with negative parts
     */
    public function testAbsNeg()
    {
        $this->assertEquals(sqrt(10),$this->cnNeg->abs());
    }

    /**
     * Testing the module function of a complex number with only real part
     */
    public function testAbsOnlyRe()
    {
        $this->assertEquals(2,$this->cnOnlyRe->abs());
    }
    /**
     * Testing the module function of a complex number with only imaginary
     */
    public function testAbsOnlyIm()
    {
        $this->assertEquals(2,$this->cnOnlyIm->abs());
    }

    /**
     * Testing the module function of a zero complex number
     */
    public function testAbsZero()
    {
        $this->assertEquals(0,$this->cn0->abs());
    }

}
