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

        // 先算出可以折扣的書的金額
        $result = $count_season * $this->price_per_book;

        switch ($count_season) {
            case 2:
                $result *= 0.95;
                break;
            case 3:
                $result *= 0.9;
                break;
            case 4:
                $result *= 0.8;
                break;
            case 5:
                $result *= 0.75;
                break;
        }

        // 沒有折扣的書已原價計算
        $result += ($book_count - $count_season) * $this->price_per_book;

        return $result;
    }
}