<?php
    require_once __DIR__."/../src/hangmanDictionary.php";   // require_once opens the hangmanDictionary.php file
    // Any time that you need to include external files in your code, you'll use the require_once keyword, followed by the path to the file. Just like it's used in the app.php file

    class Hangman
    {
        private $player;
        private $word;
        private $word_left;   // what is this for?
        private $guess_wrong;
        private $guess_total;
        private $letters;
        private $output_word; // what is this for?

        function __costruct($player, $guess_wrong, $guess_total = 0) {
            $this->player = $player;
            $this->guess_wrong = $guess_wrong;
            $this->$guess_total = $guess_total;
            $wordSelector = new HangmanDictionary();  // instantiates new word
            $this->word = $wordSelector->getWord();   // use HangmanDictionary method
            $this->word_left = $this->word;  // what is this for?
            $this->output_word = str_split($this->word);  // split up the word
            for ($i=0; $i < count($this->output_word); $i++) {
                $this->output_word[$i] = "_";     // Prints spaces = word size
            }
            $this->guess_wrong = $guess_wrong;  // what is this for?
            $this->guess_total = $guess_total;  // what is this for?
            $this->letters = "";  // what is this for?
        }

        // GETTERS
        function getWord() {
            return $this->word;
        }

        function getWordLeft() {
            return $this->word_left;
        }

        function getOutputWord() {
            return $this->output_word;
        }

        function getWrongGuess() {
            return $this->guess_wrong;
        }

        function getTotalGuess() {
            return $this->guess_total;
        }

        function getPlayer() {
            return $this->player;
        }

        function getLoser() {
            return ($this->guess_wrong > 6);
        }

        function getLetters() {
            return $this->letters;
        }

        // SETTERS - add if needed (3 of them)

        // FUNCTIONS INCRIMENTERS
        function wrongGuess() {
            $this->guess_wrong++;
        }

        function totalGuess() {
            $this->guess_total++;
        }

        // SAVE GAMES
        // Save a game result in the SESSION array
        function save() {
            array_push($_SESSION['games'], $this);
        }

        //Save THIS particular game
        function saveThisGame() {
            array_push($_SESSION['thisGame'], $this);
        }

        // GET GAMES
        // GET This particular game
        static function getThisGame() {
            return $_SESSION['thisGame'];
        }

        // GET ALL Saved games
        static function getAll() {
            return $_SESSION['games'];
        }

        // DELETE Saved Games
        static function deleteAll() {
          $_SESSION['games'] =  [];
        }
    }
?>
