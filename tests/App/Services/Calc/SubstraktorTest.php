<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:34
 */

namespace App\Services\Calc;


use tests\TestCase;

class SubstraktorTest extends TestCase{

    /**
     * @test
     */
    public function substractor_check(){
        $adder = new Substractor();
        $a = 8;
        $b = 3;

        $rezult = $adder->handle($a,$b);


        $this->assertEquals(5,$rezult);
    }

}