<?php

namespace GOF\Creationals\FactoryMethod;

use GOF\Creationals\Maze\RoomInterface;

/**
 * Description of MazeGame
 *
 * @author cris
 */
class MazeGame 
{
    public function makeMaze()
    {
        return new \GOF\Creationals\Maze\Maze();
    }
    
    public function makeRoom($number) 
    {
        return new \GOF\Creationals\Maze\Room($number);
    }
    
    public function makeDoor(RoomInterface $r1, RoomInterface $r2)
    {
        return new \GOF\Creationals\Maze\Door($r1, $r2);
    }
    
    public function makeWall()
    {
        return new \GOF\Creationals\Maze\Wall();
    }
    
    public function createMaze()
    {
        $maze = $this->makeMaze();
        
        $r1 = $this->makeRoom(1);
        $r2 = $this->makeRoom(2);
        $maze->addRoom($r1);
        $maze->addRoom($r2);
        
        $door = $this->makeDoor($r1, $r2);
        
        $r1->setSide(RoomInterface::NORTH, $this->makeWall());
        $r1->setSide(RoomInterface::EAST, $door);
        $r1->setSide(RoomInterface::SOUTH, $this->makeWall());
        $r1->setSide(RoomInterface::WEST, $this->makeWall());
        
        $r2->setSide(RoomInterface::NORTH, $this->makeWall());
        $r2->setSide(RoomInterface::WEST, $door);
        $r2->setSide(RoomInterface::SOUTH, $this->makeWall());
        $r2->setSide(RoomInterface::EAST, $this->makeWall());
        
        return $maze;
    }
}

?>