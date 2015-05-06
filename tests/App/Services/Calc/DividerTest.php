<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrey
 * Date: 06.05.15
 * Time: 13:35
 */

namespace App\Services\Calc;


use tests\TestCase;

class DividerTest extends TestCase{

    /**
     * @test
     */
    public function divider_check(){
        $adder = new Divider();
        $a = 8;
        $b = 2;

        $rezult = $adder->handle($a,$b);


        $this->assertEquals(4,$rezult);
    }

}