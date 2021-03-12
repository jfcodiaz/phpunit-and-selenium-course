<?php

namespace App;

class UnitUntestable
{

    public function getRandomQoute()
    {
        $body = 'Today the quote from ';

        $random = mt_rand(0, 2);
        if ($random == 0) {
            $body .= 'one the famous physicist ' . $person = 'Albert Einstein';
        } else if ($random == 1) {
            $body .= 'head of the Catholic Church and sovereign of the Vatican City ' . $person = 'Pope John Paul II';
        } else if ($random == 2) {
            $body .= 'the co-founder of Microsoft Corporation ' . $person = 'Bill Gates';
        }

        $quotes = new DataSource;
        $quote = $quotes->fetchQuote($person);

        return $body . ': ' . $quote;

    }
}
