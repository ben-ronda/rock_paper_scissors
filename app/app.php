<?php
	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__.'/../src/rps.php';
	// session_start();
	//     if (empty($_SESSION['list_of_anagrams'])) {
	//         $_SESSION['list_of_anagrams'] = array();
	//     }
	$app = new Silex\Application();
	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));
	$app->get('/', function() use ($app) {
		return $app['twig']->render('rps.html.twig');
	});
	$app->post("/results", function() use ($app) {
		$new_RockPaperScissors= new RockPaperScissors;
		$result = $new_RockPaperScissors->playGame($_POST['player1'], $_POST['player2']);
        return $app['twig']->render('result.html.twig', array('new_RockPaperScissors' => $result));
	});
	return $app;
?>
