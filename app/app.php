<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/hangman.php";

    // 1) create $_Session & home route
    // 2)
    // 3)

    session_start();                    // session_start to have session remembered through entire site, all pages
    if (empty($_SESSION['games'])) {    // one SESSION for all games
        $_SESSION['games'] = [];        // or array()
    }
    if (empty($_SESSION['thisGame'])) { // One SESSION for thisGame
        $_SESSION['thisGame'] = [];
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

  // 1. Route for home page
    $app->get('/', function() use ($app) {
        $numberOfWords = count(file(__DIR__."/../src/words.txt"));  // Counts words in words.txt
        return $app['twig']->render('hangman.twig', array('games' => Hangman::getAll(), 'numbers' => $numberOfWords));
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
