<?php

namespace GOF\Creationals\Maze;

use GOF\Creationals\Maze\Maze;
use GOF\Creationals\Maze\Room;
use GOF\Creationals\Maze\Wall;
use GOF\Creationals\Maze\Door;

/**
 * Description of MazeGame
 *
 * @author cris
 */
class MazeGame implements MazeGameInterface
{
    /**
     *
     * @return \GOF\Creationals\Maze\Maze 
     */
    public function createMaze() 
    {
        $maze = new Maze;
        $r1 = new Room(1);
        $r2 = new Room(2);
        $door = new Door($r1, $r2);
        
        $maze->addRoom($r1);
        $maze->addRoom($r2);
        
        $r1->setSide(Room::NORTH, new Wall());
        $r1->setSide(Room::EAST, $door);
        $r1->setSide(Room::SOUTH, new Wall());
        $r1->setSide(Room::WEST, new Wall());
        
        $r2->setSide(Room::NORTH, new Wall());
        $r2->setSide(Room::WEST, $door);
        $r2->setSide(Room::SOUTH, new Wall());
        $r2->setSide(Room::EAST, new Wall());
        
        return $maze;
    }
}

?>