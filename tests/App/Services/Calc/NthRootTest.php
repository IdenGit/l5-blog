<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:38
 */

namespace App\Services\Calc;


use tests\TestCase;

class NthRootTest extends TestCase{

    /**
     * @test
     */
    public function NthRoot_check(){
        $adder = new NthRoot();
        $a = 8;
        $b = 3;
        $c = 2;
        $rezult = $adder->handle($a,$b);


        $this->assertEquals($c,$rezult);
    }

}