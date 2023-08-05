<?php

namespace App\Http\Controllers;

use App\Helper\WordsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WordsController extends Controller
{
    private WordsHelper $wordsHelper;

    public function __construct(WordsHelper $wordsHelper)
    {
        $this->wordsHelper = $wordsHelper;
    }

    public function checkWord(Request $request)
    {
        if (!$request->word) {
            return 0;
        }

        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/$request->word")->json();

        if (!array_key_exists(0, $response)) {
            return 0;
        }

        $word = $response[0]["word"];

        $score = $this->wordsHelper->uniqueLetters($word);

        if ($this->wordsHelper->isPalindrome($word)) {
            $score += 3;
        } else if ($this->wordsHelper->isAlmostPalindrome($word)) {
            $score += 2;
        }
        return $score;
    }
}
