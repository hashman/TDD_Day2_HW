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
        $result = 0;
        for ($i = 0; $i < 5; $i++) {
            $book_count = 0;
            $count_season = 0;
            for ($j = 0; $j < 5; $j++) {
                if ($this->books[$j] <= 0) {
                    continue;
                }
                $this->books[$j]--;
                $book_count++;
                $count_season++;
            }
            $result += $book_count * $this->price_per_book * $this->getDiscountPercent($count_season);
        }

        return $result;
    }

    /**
     * 依照購買個集數回傳折扣
     * @param $count_season
     * @return float|int
     */
    private function getDiscountPercent($count_season)
    {
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

        return $discount;
    }
}