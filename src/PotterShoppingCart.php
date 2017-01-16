<?php
namespace App;

class PotterShoppingCart
{
    private $books = [];
    // 定價一本為 100 元
    private $price_per_book = 100;

    /**
     * PotterShoppingCart constructor.
     * @param int $first_season
     * @param int $second_season
     * @param int $third_season
     * @param int $forth_season
     * @param int $fifth_season
     */
    public function __construct(int $first_season = 0, int $second_season = 0, int $third_season = 0, int $forth_season = 0, int $fifth_season = 0)
    {
        $this->books =[
            $first_season,
            $second_season,
            $third_season,
            $forth_season,
            $fifth_season
        ];
    }

    /**
     * 計算哈利波特購物車購買書籍價錢
     * @return int
     */
    public function getPrice()
    {
        $count_season = 0;
        $book_count = 0;
        foreach ($this->books as $book) {
            if ($book <= 0) {
                continue;
            }
            $book_count += $book;
            $count_season++;
        }

        switch ($count_season) {
            case 2:
                $discount = 0.95;
                break;
            case 3:
                $discount = 0.9;
                break;
            case 4:
                $discount = 0.8;
                break;
            case 5:
                $discount = 0.75;
                break;
            default:
                $discount = 1;
                break;
        }

        /**
         * 先計算可以折扣的書
         * 再計算不可以折扣的書
         */
        $discount_price = ($count_season * $this->price_per_book) * $discount;
        $origin_price   = ($book_count - $count_season) * $this->price_per_book;
        $result         = $discount_price + $origin_price;

        return $result;
    }
}