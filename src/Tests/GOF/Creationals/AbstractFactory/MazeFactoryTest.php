<?php

namespace Tests\GOF\Creationals\AbstractFactory;

/**
 * Description of MazeFactoryTest
 *
 * @author cris
 */
class MazeFactoryTest extends \Tests\GOF\GOFTestCase
{
    public function testMazeFactory()
    {
        $factory = new \GOF\Creationals\AbstractFactory\MazeFactory();
        
        $maze = $factory->makeMaze();
        $this->assertTrue($maze instanceof \GOF\Creationals\Maze\Maze, __LINE__);
        
        $room1 = $factory->makeRoom(1);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
        $wall = $factory->makeWall();
        $this->assertTrue($wall instanceof \GOF\Creationals\Maze\WALL, __LINE__);
        
        $room2 = $factory->makeRoom(2);
        $door = $factory->makeDoor($room1, $room2);
        $this->assertTrue($door instanceof \GOF\Creationals\Maze\Door, __LINE__);
    }
    
    public function testCreateMaze()
    {
        $factory = new \GOF\Creationals\AbstractFactory\MazeFactory();
        $mazegame = new \GOF\Creationals\AbstractFactory\MazeGame();
        
        $maze = $mazegame->createMaze($factory);
        $this->assertTrue($maze instanceof \GOF\Creationals\Maze\Maze, __LINE__);
        
        $room1 = $maze->getRoomByNumber(1);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
        $wall = $room1->getSide(\GOF\Creationals\Maze\Room::NORTH);
        $this->assertTrue($wall instanceof \GOF\Creationals\Maze\Wall, __LINE__);
        
        $door = $room1->getSide(\GOF\Creationals\Maze\Room::EAST);
        $this->assertTrue($door instanceof \GOF\Creationals\Maze\Door, __LINE__);
        
        $room2 = $door->getOtherSideFrom($room1);
        $this->assertTrue($room2 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room2->getNumber(), 2, __LINE__);
        
        $room1 = $door->getOtherSideFrom($room2);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
        try {
            $room3 = $door->getOtherSideFrom(new \GOF\Creationals\Maze\Room(3));
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof \GOF\Creationals\Maze\NotFoundException, __LINE__);
        }
    }

    public function testCreateEnchantedMaze()
    {
        $factory = new \GOF\Creationals\AbstractFactory\EnchantedMazeFactory();
        $mazegame = new \GOF\Creationals\AbstractFactory\MazeGame();
        
        $maze = $mazegame->createMaze($factory);
        $this->assertTrue($maze instanceof \GOF\Creationals\Maze\Maze, __LINE__);
        
        $room1 = $maze->getRoomByNumber(1);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\EnchantedRoom, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
        $wall = $room1->getSide(\GOF\Creationals\Maze\Room::NORTH);
        $this->assertTrue($wall instanceof \GOF\Creationals\Maze\Wall, __LINE__);
        
        $door = $room1->getSide(\GOF\Creationals\Maze\Room::EAST);
        $this->assertTrue($door instanceof \GOF\Creationals\Maze\DoorNeedingSpell, __LINE__);
        
        $room2 = $door->getOtherSideFrom($room1);
        $this->assertTrue($room2 instanceof \GOF\Creationals\Maze\EnchantedRoom, __LINE__);
        $this->assertEquals($room2->getNumber(), 2, __LINE__);
        
        $room1 = $door->getOtherSideFrom($room2);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\EnchantedRoom, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
        try {
            $room3 = $door->getOtherSideFrom(new \GOF\Creationals\Maze\Room(3));
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof \GOF\Creationals\Maze\NotFoundException, __LINE__);
        }
    }
    
}

?>