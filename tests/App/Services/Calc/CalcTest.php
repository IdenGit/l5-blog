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
    /**
     * @test
     */
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
    public function notAdds(){

    }

    /**
     * @test
     */
    public function substracts(){

    }

    /**
     * @test
     */
    public function notSubstracts(){

    }

    /**
     * @test
     */
    public function divides(){

    }

    /**
     * @test
     */
    public function noDivides(){

    }

    /**
     * @test
     */
    public function multiplies(){

    }

    /**
     * @test
     */
    public function unMultiplies(){

    }

    /**
     * @test
     */
    public function exponentates(){

    }

    /**
     * @test
     */
    public function unExponentates(){

    }

    /**
     * @test
     */
    public function modes(){

    }

    /**
     * @test
     */
    public function unModes(){

    }

    /**
     * @test
     */
    public function substractRoots(){

    }

    /**
     * @test
     */
    public function unSubstractRoots(){

    }
}
