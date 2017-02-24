<?php
    class Hangman
    {
        private $word;
        private $guess_number;
        private $letters_guessed;
        private $hidden_word;
        private $message;

        function __costruct($new_word, $starting_guess = 0, $letters_guessed = array(), $hidden_word = array(), $message = "")
        {
            $this->word = $new_word;
            $this->guess_number = $starting_guess;
            $this->letters_guessed = $letters_guessed;
            $this->hidden_word = $hidden_word;
            $length = strlen($this->word);
                for ($i = 0; $i < $length; $i++) {     // to display dashes for the hidden word!
                  array_push($this->hidden_word, '_');
                }
            $this->message = $message;
        }

      // GETTERS
        function getWord()
        {
            return $this->word;
        }

        function getGuessNumber()
        {
            return $this->guess_number;
        }

        function getLettersGuessed()
        {
            return $this->letters_guessed;
        }

        function getHiddenWord()
        {
            return $this->hidden_word;
        }

        function getMessage()
        {
            return $this->message;
        }

      // FUNCTIONS
        function checkWord($guess_word)
        {
            if (strtolower($this->word) == strtolower($guess_word)) {
              return true;
            } else {
              return false;
            }
        }

        function checkLetter($guessed_letter)
        {                         // strpos() Finds position of 1st occurrence of a guessed_letter in word
            if (strpos($this->word, strtolower($guessed_letter)) != false ) {
              return true;
            } else {
              return false;
            }
        }


        // GETALL & SAVE
        static function getAll()
        {
            return $_SESSION['list_of_hangmans'];
        }

        function save()
        {
            array_push($_SESSION['list_of_hangmans'], $this);
        }

    }

?>
