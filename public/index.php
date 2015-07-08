<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__.'/../vendor/autoload.php';

use Blog\Service\PostService;
use Db\DoctrineRepository\DoctrinePostRepository;
use Db\DoctrineRepository\DoctrineUserRepository;

$app = new Silex\Application(array('debug'=>true));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'blog',
        'user'      => 'root',
        'password'  => '',
        'charset'   => 'utf8',
    ),
));

$app->get('/hello', function () use ($app) {

    $qb = $app['db'];
    $userRepository = new DoctrineUserRepository($qb);
    $postRepository = new DoctrinePostRepository($qb);

    $postService = new PostService($postRepository,$userRepository);
    return $postService->writePost(array('userId' => 10, 'title' => 'Test Title'));

});

$app->run();
echo "TEST";