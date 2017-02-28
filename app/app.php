<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/hangman.php";

    session_start();                    // session_start to have session remembered through entire site, all pages
    if (empty($_SESSION['games'])) {    // one SESSION for all games
        $_SESSION['games'] = [];        // or array()
    }
    if (empty($_SESSION['thisGame'])) { // One SESSION for thisGame
        $_SESSION['thisGame'] = [];
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));
  // End Red Tape

  // 1. Route for home page
    $app->get("/", function() use ($app) {
        $numberOfWords = count(file(__DIR__."/../src/words.txt"));  // Counts words in words.txt
        $_SESSION['thisGame'] = [];  // why is this here?
        return $app['twig']->render('home.twig', array('games' => Game::getAll(), 'numbers' => $numberOfWords));
    });

  // 2. DELETE Route
    $app->get('/delete_games', function() use ($app) {    // Why 'get' and not 'post'?
        Game::deleteAll();

        return $app['twig']->render('home.twig', array('games' => Game::getAll(), 'numbers' => $numberOfWords));
    });

  // 2. Route for sending instantiated new object (new task) to /tasks URL
    $app->post('/hangman', function() use ($app) {
        $newGame = new Game($_POST['name']);
        $newGame->saveThisGame();

        return $app['twig']->render('hangman.twig', array('game' => $newGame));
    });

  // 3. Route for deleting all tasks
    // $app




    return $app;

?>
