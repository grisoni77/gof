<?php

namespace GOF\Creationals\Builder;

use GOF\Creationals\Builder\AbstractMazeBuilder;

/**
 * Description of StandardMazeBuilder
 *
 * @author cris
 */
class StandardMazeBuilder extends AbstractMazeBuilder
{
    /**
     * @inheritdoc 
     */
    public function buildMaze()
    {
        $this->_currentMaze = new \GOF\Creationals\Maze\Maze();
    }
    
    /**
     * @inheritdoc 
     */
    public function buildRoom($number)
    {
        if (!$this->_currentMaze->getRoomByNumber($number))
        {
            $room = new \GOF\Creationals\Maze\Room($number);
            $this->_currentMaze->addRoom($room);
            // set room sides
            $room->setSide(\GOF\Creationals\Maze\RoomInterface::NORTH, new \GOF\Creationals\Maze\Wall());
            $room->setSide(\GOF\Creationals\Maze\RoomInterface::SOUTH, new \GOF\Creationals\Maze\Wall());
            $room->setSide(\GOF\Creationals\Maze\RoomInterface::EAST, new \GOF\Creationals\Maze\Wall());
            $room->setSide(\GOF\Creationals\Maze\RoomInterface::WEST, new \GOF\Creationals\Maze\Wall());
        }
    }
    
    /**
     * @inheritdoc 
     */
    public function buildDoor($r1, $r2, $direction)
    {
        $room1 = $this->_currentMaze->getRoomByNumber($r1);
        $room2 = $this->_currentMaze->getRoomByNumber($r2);
        $door = new \GOF\Creationals\Maze\Door($room1, $room2);
        // set new room sides
        $room1->setSide($direction, $door);
        $room2->setSide($room2->getAdjacentDirection($direction), $door);
    }
    
}

?>