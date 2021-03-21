<?php 

namespace App\Cart;

use Money\Money as BaseMoney;
use Money\Currency;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;

class Money {
    protected $money;
    public function __construct($value) {
        $this->money = new BaseMoney($value, new Currency('EUR'));
    }

    public function amount() {
        return $this->money->getAmount();
    }

    public function formatted() {
        $formatter = new IntlMoneyFormatter(
            new \NumberFormatter('fr_FR',  \NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );
    
        return $formatter->format($this->money);
    }
}