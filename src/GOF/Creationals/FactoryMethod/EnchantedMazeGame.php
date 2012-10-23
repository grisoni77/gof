<?php

namespace GOF\Creationals\FactoryMethod;

use GOF\Creationals\Maze\RoomInterface;

/**
 * Description of EnchantedMazeGame
 *
 * @author cris
 */
class EnchantedMazeGame extends MazeGame
{
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