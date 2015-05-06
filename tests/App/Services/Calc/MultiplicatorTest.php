<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:38
 */

namespace App\Services\Calc;


use tests\TestCase;

class MultiplicatorTest extends TestCase{

    /**
     * @test
     */
    public function multiplicator_check(){
        $adder = new Multiplicator();
        $a = 8;
        $b = 3;

        $rezult = $adder->handle($a,$b);


        $this->assertEquals(24,$rezult);
    }

}