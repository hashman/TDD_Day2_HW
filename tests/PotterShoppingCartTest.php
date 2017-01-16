<?php

class PotterShoppingCartTest extends \PHPUnit\Framework\TestCase
{
    public function test_for_第一集買了一本其他都沒有買()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 0;
        $third_season = 0;
        $forth_season = 0;
        $fifth_season = 0;
        $expect = 100;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }
}