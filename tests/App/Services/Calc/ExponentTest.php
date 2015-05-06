<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:36
 */

namespace App\Services\Calc;


use tests\TestCase;

class ExponentTest extends TestCase{

    /**
     * @test
     */
    public function exponentater_check(){
        $adder = new Exponentater();
        $a = 8;
        $b = 2;

        $rezult = $adder->handle($a,$b);


        $this->assertEquals(64,$rezult);
    }

}