<?php
    class Hangman
    {
        private $player;
        private $word;
        private $word_left;   // what is this for?
        private $guess_wrong;
        private $guess_total;
        private $letters;
        private $output_word; // what is this for?

        function __costruct($player, $guess_wrong, $guess_total) {
            $this->player = $player;
            $this->guess_wrong = $guess_wrong;
            $this->$guess_total = $guess_total;
            $this->
            $this->
        }

      // GETTERS
        function getWord()
        {
            return $this->word;
        }



      // FUNCTIONS



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
        static function deleteAll()
        {
          $_SESSION['games'] =  [];
        }
    }
?>
