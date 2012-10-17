<?php

namespace GOF\Creationals\AbstractFactory;

use GOF\Creationals\Maze\EnchantedRoom;

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
     * @return \GOF\Creationals\Maze\EnchantedRoom 
     */
    public function makeRoom($number)
    {
        return new \GOF\Creationals\Maze\EnchantedRoom($number);
    }
    
    public function makeDoor(Room $r1, Room $r2)
    {
        return new \GOF\Creationals\Maze\DoorNeedingSpell($r1, $r2);
    }
}

?>