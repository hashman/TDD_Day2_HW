<?php
use App\PotterShoppingCart;
use Behat\Behat\Context\Context;
use PHPUnit_Framework_Assert as PHPUnit;

class FeatureContext implements Context
{
    private $first_season,
        $second_season,
        $third_season,
        $forth_season,
        $fifth_season;
    private $potterShoppingCart;

    /**
     * @Given /^第一集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第一集買了本(int $number)
    {
        $this->first_season = $number;
    }

    /**
     * @Given /^第二集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第二集買了本(int $number)
    {
        $this->second_season = $number;
    }

    /**
     * @Given /^第三集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第三集買了本(int $number)
    {
        $this->third_season = $number;
    }

    /**
     * @Given /^第四集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第四集買了本(int $number)
    {
        $this->forth_season = $number;
    }

    /**
     * @Given /^第五集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第五集買了本(int $number)
    {
        $this->fifth_season = $number;
    }

    /**
     * @When /^結帳$/
     */
    public function 結帳()
    {
        $this->potterShoppingCart = new PotterShoppingCart($this->first_season, $this->second_season, $this->third_season, $this->forth_season, $this->fifth_season);
    }

    /**
     * @Then /^價格應為 (\d+) 元$/
     * @param $expected
     */
    public function 價格應為元($expected)
    {
        PHPUnit::assertEquals($expected, $this->potterShoppingCart->getPrice());
    }
}