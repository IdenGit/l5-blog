<?php namespace tests;

use App\Services\Calc\Calc;
use Mockery;

class CalcTest extends TestCase
{
    /**
     * @test
     */
    public function adds()
    {
        $adder = new \tests\Stubs\Adder;
        $sub = Mockery::mock('App\Services\Calc\Substractor');

        // Arrange
        $calc = new Calc($adder, $sub);
        $a = 5;
        $b = 6;

        // Act
        $result = $calc->add($a, $b);

        // Assert
        $this->assertEquals(11, $result);
    }

    /**
     * @test
     */
    public function substracts()
    {
        $adder = Mockery::mock('App\Services\Calc\Adder');
        $sub = Mockery::mock('App\Services\Calc\Substractor')->shouldReceive('handle')->once()->andReturn(-1)->mock();

        // Arrange
        $calc = new Calc($adder, $sub);
        $a = 5;
        $b = 6;

        // Act
        $result = $calc->sub($a, $b);

        // Assert
        $this->assertEquals(-1, $result);
    }
}
