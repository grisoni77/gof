<?php
// classloader.php
require_once __DIR__.'/../vendor/autoload.php';
        
//require_once __DIR__.'/vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';
$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$loader->registerNamespaces(array(
    'GOF' => __DIR__
));
$loader->register();

$game = new GOF\Creationals\Maze\MazeGame();
$maze = $game->createMaze();
$room1 = $maze->getRoomByNumber(1);
echo $room1->getNumber();
print_r($room1);