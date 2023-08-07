<?php

namespace Tests\Unit;

use Tests\TestCase;

class ApiTest extends TestCase
{
    public function test_word(): void
    {
        $response = $this->get('/api/word?word=bathtub');
        $test = $response->getContent();
        $this->assertEquals($test, 5);
    }

    public function test_palindrome(): void
    {
        $response = $this->get('api/word?word=kayak');
        $test = $response->getContent();
        $this->assertEquals($test, 6);
    }

    public function test_almost_palindrome(): void
    {
        $response = $this->get('api/word?word=reefer');
        $test = $response->getContent();
        $this->assertEquals($test, 5);
    }

    public function test_empty(): void
    {
        $response = $this->get('api/word?word=');
        $test = $response->getContent();
        $this->assertEquals($test, 0);
    }

    public function test_not_eng_word(): void
    {
        $response = $this->get('api/word?word=jeste');
        $test = $response->getContent();
        $this->assertEquals($test, 0);
    }

    public function test_number(): void
    {
        $response = $this->get('api/word?word=kayak234');
        $test = $response->getContent();
        $this->assertEquals($test, 0);
    }
}
