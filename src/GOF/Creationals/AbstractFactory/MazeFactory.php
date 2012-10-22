<?php

namespace GOF\Creationals\AbstractFactory;

use GOF\Creationals\Maze\Room;
use GOF\Creationals\Maze\RoomInterface;

/**
 * Description of MazeFactory
 *
 * @author cris
 */
class MazeFactory implements MazeFactoryInterface
{
    /**
     *
     * @return \GOF\Creationals\Maze\Maze 
     */
    public function makeMaze()
    {
        return new \GOF\Creationals\Maze\Maze;
    }
    
    /**
     *
     * @return \GOF\Creationals\Maze\Wall 
     */
    public function makeWall()
    {
        return new \GOF\Creationals\Maze\Wall();
    }
    
    /**
     *
     * @param int $number
     * @return \GOF\Creationals\Maze\Room 
     */
    public function makeRoom($number)
    {
        return new \GOF\Creationals\Maze\Room($number);
    }
    
    /**
     *
     * @param Room $r1
     * @param Room $r2
     * @return \GOF\Creationals\Maze\DoorInterface
     */
    public function makeDoor(RoomInterface $r1, RoomInterface $r2)
    {
        return new \GOF\Creationals\Maze\Door($r1, $r2);
    }
}

?>