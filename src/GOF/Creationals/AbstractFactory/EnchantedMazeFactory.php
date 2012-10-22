<?php

namespace GOF\Creationals\AbstractFactory;

use GOF\Creationals\Maze\Room;
use GOF\Creationals\Maze\RoomInterface;

/**
 * Description of EnchantedMazeFactory
 *
 * @author cris
 */
class EnchantedMazeFactory extends MazeFactory
{
    /**
     *
     * @param int $number
     * @return \GOF\Creationals\Maze\RoomInterface
     */
    public function makeRoom($number)
    {
        return new \GOF\Creationals\Maze\EnchantedRoom($number);
    }
    
    public function makeDoor(RoomInterface $r1, RoomInterface $r2)
    {
        return new \GOF\Creationals\Maze\DoorNeedingSpell($r1, $r2);
    }
}

?>