<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/hangman.php";

    session_start();                          // For global variable, saving in browser cache
    if (empty($_SESSION['list_of_letters'])) {
        $_SESSION['list_of_letters'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

  // 1. Route for home page
    $app->get('/', function() use ($app) {
        return $app['twig']->render('hangman.html.twig', array('letters' => Hangman::getAll()));
    });

  // 2. Route for sending instantiated new object (new task) to /tasks URL
    $app->post('/hangman', function() use ($app) {
        
    });

  // 3. Route for deleting all tasks
    // $app

    return $app;

?>
