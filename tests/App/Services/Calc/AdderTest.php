<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:31
 */

namespace App\Services\Calc;


use tests\TestCase;

class AdderTest extends TestCase{


    /**
     * @test
     */
    public function adder_check(){
        $adder = new Adder();
        $a = 8;
        $b = 3;

        $rezult = $adder->handle($a,$b);


        $this->assertEquals(11,$rezult);
    }

}