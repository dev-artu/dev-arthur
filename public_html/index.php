<?php
use Silex\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app['debug'] = true;

/*
Home Route
*/

$app->get('/', function(Application $app){
  return $app['twig']->render('index.twig');
})
->bind('index');

/*
About Route
*/

$app->get('/computerskills', function(Application $app){
  return $app['twig']->render('computerskills.twig');
})
->bind('computerskills');

/*
Portfolio Route
*/

$app->get('/portfolio', function(Application $app){
  return $app['twig']->render('portfolio.twig');
})
->bind('portfolio');

/*
Contato Route
*/

$app->get('/contato', function(Application $app){
  return $app['twig']->render('contato.twig');
})
->bind('contato');

/*
MySQL
*/
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbhost' => 'localhost',
        'dbname' => 'user',
        'user' => 'root',
        'password' => '',
    ),
));

/*
Twig Provider
*/

$app->register(new Silex\Provider\TwigServiceProvider(), [
  'twig.path' => '../views'
]);

$app->run();
