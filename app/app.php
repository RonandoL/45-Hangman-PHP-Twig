<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/hangman.php";

    // 1) create $_Session & home route
    // 2) create variable array of words to use & word that is randomly selected
    // 3) create instantiated word variable for new word, randomly from words array
    // 4) $app['debug'] = true .....

    session_start();                   // session_start to have session remembered through entire site, all pages
    if (empty($_SESSION['list_of_hangmans'])) {
        $_SESSION['list_of_hangmans'] = array();
        $gameWords = array('Batman', 'Robin', 'Superman');   // words the game will pick from
        $gameWord = new Hangman($gameWords[rand(0, strlen($gameWords))]);  // Randomly picks word to play with and gets length of word
        array_push($_SESSION['list_of_hangmans'], $gameWord);  // saving specific word in SESSION variable
    }

    $app = new Silex\Application();
    $app['debug'] = true;    // I don't know why this is here

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

  // 1. Route for home page
    $app->get('/', function() use ($app) {
        return $app['twig']->render('hangman.html.twig', array('theGame' => Hangman::getAll()));
    });

  // 2. Route for sending instantiated new object (new task) to /tasks URL
    // $app->post('/hangman', function() use ($app) {
    //     $letter = new Hangman($_POST['letter']);
    //     $letter->save();
    //
    //     return $app['twig']->render('hangman.html.twig', array('theGame' => Hangman::getAll()));
    // });

  // 3. Route for deleting all tasks
    // $app

    return $app;

?>
