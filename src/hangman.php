<?php
    class Hangman
    {
        private $letter;
        private $words;

        function __costruct($letter)
        {
            $this->letter = $letter;
            $this->words = $_SESSION['Batman', 'Robin', 'Superman'];
        }

        function getLetter()
        {
            return $this->letter;
        }

        function getWords()
        {
            return $this->words;
        }

        static function getAll()
        {
            $_SESSION['list_of_letters'];
        }

        function save()
        {
            array_push($_SESSION['list_of_letters'], $letter);
        }

    }

?>
