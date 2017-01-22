<?php
namespace App;

class PotterShoppingCart
{
    private $books = [];
    // 定價一本為 100 元
    private $price_per_book = 100;
    private $book_count = 0;
    private $count_season = 0;

    /**
     * PotterShoppingCart constructor.
     */
    public function __construct()
    {
        $this->book_count   = 0;
        $this->count_season = 0;
        $this->books        = [];
    }

    /**
     * @param int $season_num 購買第幾集的書
     * @param int $number     購買此集的書幾本
     */
    public function addBook(int $season_num, int $number)
    {
        $this->books[$season_num] = $number;
    }

    /**
     * 計算哈利波特購物車購買書籍價錢
     * @return int
     */
    public function getPrice()
    {
        $result = 0;
        for ($i = 1; $i <= 5; $i++) {
            $this->book_count = 0;
            $this->count_season = 0;
            for ($j = 1; $j <= 5; $j++) {
                if ($this->books[$j] <= 0) {
                    continue;
                }
                $this->books[$j]--;
                $this->book_count++;
                $this->count_season++;
            }
            $result += $this->getDiscountPrice();
        }

        return $result;
    }

    /**
     * 依照購買個集數回傳折扣
     * @return float|int
     */
    private function getDiscountPercent()
    {
        switch ($this->count_season) {
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

    /**
     * 取得 discount 後的金額
     * @return float|int
     */
    private function getDiscountPrice()
    {
        return $this->book_count * $this->price_per_book * $this->getDiscountPercent();
    }
}