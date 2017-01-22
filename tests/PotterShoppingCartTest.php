<?php
use App\PotterShoppingCart;

class PotterShoppingCartTest extends \PHPUnit\Framework\TestCase
{
    public function test_for_第一集買了一本其他都沒有買()
    {
        /** arrange */
        $cart = new PotterShoppingCart();
        $cart->addBook(1, 1);
        $cart->addBook(2, 0);
        $cart->addBook(3, 0);
        $cart->addBook(4, 0);
        $cart->addBook(5, 0);
        $expect = 100;

        /** act */
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }

    public function test_for_第一集買了一本第二集也買了一本()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 1;
        $third_season = 0;
        $forth_season = 0;
        $fifth_season = 0;
        $expect = 190;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }

    public function test_for_一二三集各買一本()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 1;
        $third_season = 1;
        $forth_season = 0;
        $fifth_season = 0;
        $expect = 270;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }

    public function test_for_一二三四集各買一本()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 1;
        $third_season = 1;
        $forth_season = 1;
        $fifth_season = 0;
        $expect = 320;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }

    public function test_for_買一整套的()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 1;
        $third_season = 1;
        $forth_season = 1;
        $fifth_season = 1;
        $expect = 375;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }

    public function test_for_一二集各買一本第三級買兩本()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 1;
        $third_season = 2;
        $forth_season = 0;
        $fifth_season = 0;
        $expect = 370;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }

    public function test_for_第一集一本二三集各買兩本()
    {
        /** arrange */
        $first_season = 1;
        $second_season = 2;
        $third_season = 2;
        $forth_season = 0;
        $fifth_season = 0;
        $expect = 460;

        /** act */
        $cart = new PotterShoppingCart($first_season, $second_season, $third_season, $forth_season, $fifth_season);
        $actual = $cart->getPrice();

        /** assert */
        $this->assertEquals($expect, $actual);
    }
}