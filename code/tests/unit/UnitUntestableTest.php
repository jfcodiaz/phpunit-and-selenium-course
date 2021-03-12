<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\UnitUntestable;
use App\DataSource;
use App\RandomService;
use Prophecy\Promise\ReturnPromise;

class UnitUntestableTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */

    public function testRandomQuote($random, $qouteNumber, $expedtedPerson, $expected)
    {
        $randomServiceMook = $this->getMockBuilder(RandomService::class)->getMock();
        $randomServiceMook->method('__invoke')->willReturn($random);
        $dataSourceMook = $this->getMockBuilder(DataSource::class)
            ->onlyMethods(['fetchQuote'])
            ->getMock();

        $dataSourceMook->method('fetchQuote')
            ->will(
                $this->returnCallback(
                    function ($person) use ($dataSourceMook, $qouteNumber) {
                        return $dataSourceMook->data[$person][$qouteNumber];
                    }
                )
            );

        $obj = new UnitUntestable($randomServiceMook, $dataSourceMook);
        $qoute = $obj->getRandomQoute();
        $this->assertStringContainsString($expected, $qoute);
        $this->assertStringContainsString($expedtedPerson, $qoute);
        $this->assertStringContainsString($expected, $qoute);
    }

    public function dataProvider()
    {
        return [
            [0, 0, 'Albert Einstein', '"Insanity: doing the same thing over and over again and expecting different results."'],
            [0, 1, 'Albert Einstein', '"Imagination is more important than knowledge."'],
            [0, 2, 'Albert Einstein', '"Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe."'],
            [1, 0, 'Pope John Paul II', '"Do not abandon yourselves to despair. We are the Easter people and hallelujah is our song."'],
            [1, 1, 'Pope John Paul II', '"The future starts today, not tomorrow."'],
            [1, 2, 'Pope John Paul II', '"As the family goes, so goes the nation and so goes the whole world in which we live."'],
            [2, 0, 'Bill Gates', '"Success is a lousy teacher. It seduces smart people into thinking they can\'t lose."'],
            [2, 1, 'Bill Gates', '"Your most unhappy customers are your greatest source of learning."'],
            [2, 2, 'Bill Gates', '"It\'s fine to celebrate success but it is more important to heed the lessons of failure."'],
        ];
    }
}
