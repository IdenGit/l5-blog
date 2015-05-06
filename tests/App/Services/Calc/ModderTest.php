<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:37
 */

namespace App\Services\Calc;


use tests\TestCase;

class ModderTest extends TestCase{

    /**
     * @test
     */
    public function modder_check(){
        $adder = new Modder();
        $a = 8;
        $b = 3;

        $rezult = $adder->handle($a,$b);


        $this->assertEquals(2,$rezult);
    }

}