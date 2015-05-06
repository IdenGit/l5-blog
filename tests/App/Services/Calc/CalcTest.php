<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 04.05.15
 * Time: 18:20
 */

namespace App\Services\Calc;


use \Mockery;
use tests\TestCase;

/**
 * Class CalcTest
 * @package App\Services\Calc
 */
class CalcTest extends TestCase {

    public function __construct(){
        $this->adder = Mockery::mock('App\Services\Calc\Adder');
        $this->substractor = Mockery::mock('App\Services\Calc\Substractor');
        $this->multiplicator = Mockery::mock('App\Services\Calc\Multiplicator');
        $this->divider = Mockery::mock('App\Services\Calc\Divider');
        $this->exponentater = Mockery::mock('App\Services\Calc\Exponentater');
        $this->nth_root = Mockery::mock('App\Services\Calc\NthRoot');
        $this->modder = Mockery::mock('App\Services\Calc\Modder');
    }

    /**
     * @test
     */
    public function adds(){
        $adder = $this->adder->shouldReceive('handle')->once()->andReturn(15)->mock();
        $substractor = $this->substractor;
        $multiplicator = $this->multiplicator;
        $divider = $this->divider;
        $exponentater = $this->exponentater;
        $nth_root = $this->nth_root;
        $modder = $this->modder;

        // Arrange
        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 5;
        $b = 10;

        //Act
        $rezult = $calc->add($a,$b);

        //Assert
        $this->assertEquals(15,$rezult);
    }

    /**
     * @test
     */
    public function substracts(){
        $adder = $this->adder;
        $substractor = $this->substractor->shouldReceive('handle')->once()->andReturn(5)->mock();
        $multiplicator = $this->multiplicator;
        $divider = $this->divider;
        $exponentater = $this->exponentater;
        $nth_root = $this->nth_root;
        $modder = $this->modder;

        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 10;
        $b = 5;

        $rezult = $calc->substract($a,$b);


        $this->assertEquals(5,$rezult);

    }

    /**
     * @test
     */
    public function divides(){
        $adder = $this->adder;
        $substractor = $this->substractor;
        $multiplicator = $this->multiplicator;
        $divider = $this->divider->shouldReceive('handle')->once()->andReturn(5)->mock();
        $exponentater = $this->exponentater;
        $nth_root = $this->nth_root;
        $modder = $this->modder;

        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 10;
        $b = 2;

        $rezult = $calc->divide($a,$b);


        $this->assertEquals(5,$rezult);
    }

    /**
     * @test
     */
    public function multiplies(){
        $adder = $this->adder;
        $substractor = $this->substractor;
        $multiplicator = $this->multiplicator->shouldReceive('handle')->once()->andReturn(25)->mock();
        $divider = $this->divider;
        $exponentater = $this->exponentater;
        $nth_root = $this->nth_root;
        $modder = $this->modder;

        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 5;
        $b = 5;

        $rezult = $calc->multiply($a,$b);


        $this->assertEquals(25,$rezult);
    }

     /**
     * @test
     */
    public function exponentates(){
        $adder = $this->adder;
        $substractor = $this->substractor;
        $multiplicator = $this->multiplicator;
        $divider = $this->divider;
        $exponentater = $this->exponentater->shouldReceive('handle')->once()->andReturn(8)->mock();
        $nth_root = $this->nth_root;
        $modder = $this->modder;

        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 2;
        $b = 3;

        $rezult = $calc->exponentate($a,$b);


        $this->assertEquals(8,$rezult);
    }


    /**
     * @test
     */
    public function modes(){
        $adder = $this->adder;
        $substractor = $this->substractor;
        $multiplicator = $this->multiplicator;
        $divider = $this->divider;
        $exponentater = $this->exponentater;
        $nth_root = $this->nth_root;
        $modder = $this->modder->shouldReceive('handle')->once()->andReturn(1)->mock();

        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 5;
        $b = 2;

        $rezult = $calc->mod($a,$b);


        $this->assertEquals(1,$rezult);
    }

    /**
     * @test
     */
    public function substractRoots(){
        $adder = $this->adder;
        $substractor = $this->substractor;
        $multiplicator = $this->multiplicator;
        $divider = $this->divider;
        $exponentater = $this->exponentater;
        $nth_root = $this->nth_root->shouldReceive('handle')->once()->andReturn(2)->mock();
        $modder = $this->modder;

        $calc = new Calc($adder,$substractor,$multiplicator,$divider,$exponentater,$nth_root,$modder);
        $a = 8;
        $b = 3;

        $rezult = $calc->nth_root($a,$b);


        $this->assertEquals(2,$rezult);
    }

}
