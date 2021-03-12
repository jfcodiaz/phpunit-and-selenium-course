<?php

namespace App;

class UnitUntestable
{

    private $randomService;
    private $dataSource;

    public function __construct($randomService, $dataSource)
    {
        $this->randomService = $randomService;
        $this->dataSource = $dataSource;
    }

    public function getRandomQoute()
    {
        $body = 'Today the quote from ';

        $random = $this->randomService->__invoke();
        if ($random == 0) {
            $person = 'Albert Einstein';
            $body .= 'one the famous physicist ';
        } else if ($random == 1) {
            $person = 'Pope John Paul II';
            $body .= 'head of the Catholic Church and sovereign of the Vatican City ';
        } else if ($random == 2) {
            $person = 'Bill Gates';
            $body .= 'the co-founder of Microsoft Corporation ';
        }

        $quotes = $this->dataSource;
        $quote = $quotes->fetchQuote($person);

        return $body . $person . ': ' . $quote;

    }
}
