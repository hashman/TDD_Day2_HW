<?php
use App\PotterShoppingCart;
use Behat\Behat\Context\Context;
use PHPUnit_Framework_Assert as PHPUnit;

class FeatureContext implements Context
{
    private $potterShoppingCart;
    private $total_price;

    public function __construct()
    {
        $this->potterShoppingCart = new PotterShoppingCart();
    }

    /**
     * @Given /^第一集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第一集買了本(int $number)
    {
        $this->potterShoppingCart->addBook(1, $number);
    }

    /**
     * @Given /^第二集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第二集買了本(int $number)
    {
        $this->potterShoppingCart->addBook(2, $number);
    }

    /**
     * @Given /^第三集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第三集買了本(int $number)
    {
        $this->potterShoppingCart->addBook(3, $number);
    }

    /**
     * @Given /^第四集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第四集買了本(int $number)
    {
        $this->potterShoppingCart->addBook(4, $number);
    }

    /**
     * @Given /^第五集買了 (\d+) 本$/
     * @param int $number
     */
    public function 第五集買了本(int $number)
    {
        $this->potterShoppingCart->addBook(5, $number);
    }

    /**
     * @When /^結帳$/
     */
    public function 結帳()
    {
        $this->total_price = $this->potterShoppingCart->getPrice();
    }

    /**
     * @Then /^價格應為 (\d+) 元$/
     * @param $expected
     */
    public function 價格應為元($expected)
    {
        PHPUnit::assertEquals($expected, $this->total_price);
    }
}