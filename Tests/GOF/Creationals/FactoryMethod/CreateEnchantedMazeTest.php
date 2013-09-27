<?php

namespace Tests\GOF\Creationals\FactoryMethod;

/**
 * Description of CreateEnchantedMazeTest
 *
 * @author cris
 */
class CreateEnchantedMazeTest extends CreateMazeTest
{
    public function setUp()
    {
        $this->mazegame = new \GOF\Creationals\FactoryMethod\EnchantedMazeGame();
        $this->roomClass = new \ReflectionClass('\\GOF\\Creationals\\Maze\\EnchantedRoom');
        $this->doorClass = new \ReflectionClass('\\GOF\\Creationals\\Maze\\DoorNeedingSpell');
    }
}

?>