<?php

namespace Tests\Unit;

use App\Helper\WordsHelper;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    private WordsHelper $wordsHelper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->wordsHelper = app(WordsHelper::class);
    }

    public function test_unique_letters(): void
    {
        $test1 = $this->wordsHelper->uniqueLetters('football');
        $test2 = $this->wordsHelper->uniqueLetters('later');
        $test3 = $this->wordsHelper->uniqueLetters('ally');

        $this->assertEquals($test1, 6);
        $this->assertEquals($test2, 5);
        $this->assertEquals($test3, 3);
    }

    public function test_palindrome(): void
    {
        $test1 = $this->wordsHelper->isPalindrome('almost');
        $test2 = $this->wordsHelper->isPalindrome('kayak');
        $test3 = $this->wordsHelper->isPalindrome('rotator');

        $this->assertEquals($test1, false);
        $this->assertEquals($test2, true);
        $this->assertEquals($test3, true);
    }

    public function test_almost_palindrome(): void
    {
        $test1 = $this->wordsHelper->isAlmostPalindrome('detected');
        $test2 = $this->wordsHelper->isAlmostPalindrome('mister');
        $test3 = $this->wordsHelper->isAlmostPalindrome('reefer');

        $this->assertEquals($test1, true);
        $this->assertEquals($test2, false);
        $this->assertEquals($test3, true);
    }
}
