<?php

namespace GOF\Creationals\AbstractFactory;

use GOF\Creationals\Maze\Room;

/**
 * Description of Maze
 *
 * @author cris
 */
class MazeGame
{
    public function createMaze(\GOF\Creationals\AbstractFactory\MazeFactoryInterface $factory)
    {
        $maze = $factory->makeMaze();
        $r1 = $factory->makeRoom(1);
        $r2 = $factory->makeRoom(2);
        $door = $factory->makeDoor($r1, $r2);
        
        $maze->addRoom($r1);
        $maze->addRoom($r2);
        
        $r1->setSide(Room::NORTH, $factory->makeWall());
        $r1->setSide(Room::EAST, $door);
        $r1->setSide(Room::SOUTH, $factory->makeWall());
        $r1->setSide(Room::WEST, $factory->makeWall());
        
        $r2->setSide(Room::NORTH, $factory->makeWall());
        $r2->setSide(Room::WEST, $door);
        $r2->setSide(Room::SOUTH, $factory->makeWall());
        $r2->setSide(Room::EAST, $factory->makeWall());
        
        return $maze;
    }
}

?>