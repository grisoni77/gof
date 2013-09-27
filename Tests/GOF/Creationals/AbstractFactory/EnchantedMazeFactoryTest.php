<?php

namespace Tests\GOF\Creationals\AbstractFactory;

/**
 * Description of MazeFactoryTest
 *
 * @author cris
 */
class EnchantedMazeFactoryTest extends \Tests\GOF\GOFTestCase
{
    public function testEnchantedMazeFactory()
    {
        $factory = new \GOF\Creationals\AbstractFactory\EnchantedMazeFactory();
        
        $maze = $factory->makeMaze();
        $this->assertTrue($maze instanceof \GOF\Creationals\Maze\Maze, __LINE__);
        
        $room1 = $factory->makeRoom(1);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\EnchantedRoom, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
        $wall = $factory->makeWall();
        $this->assertTrue($wall instanceof \GOF\Creationals\Maze\Wall, __LINE__);
        
        $room2 = $factory->makeRoom(2);
        $door = $factory->makeDoor($room1, $room2);
        $this->assertTrue($door instanceof \GOF\Creationals\Maze\DoorNeedingSpell, __LINE__);
    }
}

?>