<?php namespace tests;

use App\Services\Calc\Calc;
use Mockery;

class CalcTest extends TestCase
{
    /**
     * @test
     * @expectedException \App\Exceptions\WrongArgumentException
     */
    public function throws_argument_exception()
    {
        // Arrange
        $calc = new Calc;

        // Act
        $calc->add(5, '1');
    }
}
