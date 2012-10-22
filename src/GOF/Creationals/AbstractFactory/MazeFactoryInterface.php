<?php

namespace GOF\Creationals\AbstractFactory;

use GOF\Creationals\Maze\Room;
use GOF\Creationals\Maze\RoomInterface;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author cris
 */
interface MazeFactoryInterface 
{
    /**
     *
     * @return \GOF\Creationals\Maze\Maze 
     */
    public function makeMaze();
    
    /**
     *
     * @return \GOF\Creationals\Maze\WallInterface 
     */
    public function makeWall();
    
    /**
     *
     * @param int $number
     * @return \GOF\Creationals\Maze\RoomInterface
     */
    public function makeRoom($number);
    
    /**
     *
     * @param Room $r1
     * @param Room $r2
     * @return \GOF\Creationals\Maze\DoorInterface 
     */
    public function makeDoor(RoomInterface $r1, RoomInterface $r2);
}

?>
