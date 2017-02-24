<?php

    // Using a 2nd class to pick a new word to play with

    class hangmanDictionary {
        private $word;
        private $dictionary;

        function __construct() {
            $this->dictionary = file(_DIR_."../src/words.txt");  // grabs file of words
            $dictionary_length = count($this->dictionary);  // counts # of words in dictionary
            $randNum = rand(0, $dictionary_length);   // randomly picks a number in dictionary
            $this->word = $this->dictionary[$randNum];  // picks word based on random # pick
            $this->word = rtrim($this->word);   // strips trailing blank spaces
        }

        function getWord() {
            return $this->word;
        }

    }
?>
