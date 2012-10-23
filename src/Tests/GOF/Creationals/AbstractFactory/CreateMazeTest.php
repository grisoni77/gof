<?php

namespace Tests\GOF\Creationals\AbstractFactory;

/**
 * Description of MazeFactoryTest
 *
 * @author cris
 */
class CreateMazeTest extends \Tests\GOF\GOFTestCase
{
    protected $factory;
    protected $mazegame;
    
    public function setUp()
    {
        $this->factory = new \GOF\Creationals\AbstractFactory\MazeFactory();
        $this->mazegame = new \GOF\Creationals\AbstractFactory\MazeGame();
    }
    
    public function testMaze()
    {
        $factory = $this->factory;
        $mazegame = $this->mazegame;
        
        $maze = $mazegame->createMaze($factory);
        $this->assertTrue($maze instanceof \GOF\Creationals\Maze\Maze, __LINE__);
    }
    
    public function testRoom()
    {
        $factory = $this->factory;
        $mazegame = $this->mazegame;
        
        $maze = $mazegame->createMaze($factory);
        $room1 = $maze->getRoomByNumber(1);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
    }
    
    public function testWall()
    {
        $factory = $this->factory;
        $mazegame = $this->mazegame;
        
        $maze = $mazegame->createMaze($factory);
        $room1 = $maze->getRoomByNumber(1);
        $wall = $room1->getSide(\GOF\Creationals\Maze\Room::NORTH);
        $this->assertTrue($wall instanceof \GOF\Creationals\Maze\Wall, __LINE__);
    }
    
    public function testDoor()
    {
        $factory = $this->factory;
        $mazegame = $this->mazegame;
        
        $maze = $mazegame->createMaze($factory);
        $room1 = $maze->getRoomByNumber(1);
        $door = $room1->getSide(\GOF\Creationals\Maze\Room::EAST);
        $this->assertTrue($door instanceof \GOF\Creationals\Maze\Door, __LINE__);
    }
    
    public function testGetOtherSideFrom()
    {
        $factory = $this->factory;
        $mazegame = $this->mazegame;
        
        $maze = $mazegame->createMaze($factory);
        $room1 = $maze->getRoomByNumber(1);
        $door = $room1->getSide(\GOF\Creationals\Maze\Room::EAST);
        
        $room2 = $door->getOtherSideFrom($room1);
        $this->assertTrue($room2 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room2->getNumber(), 2, __LINE__);
        
        $room1 = $door->getOtherSideFrom($room2);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
    }
    
    public function testNotFoundException()
    {
        $factory = $this->factory;
        $mazegame = $this->mazegame;
        
        $maze = $mazegame->createMaze($factory);
        $room1 = $maze->getRoomByNumber(1);
        $door = $room1->getSide(\GOF\Creationals\Maze\Room::EAST);
        
        try {
            $room3 = $door->getOtherSideFrom(new \GOF\Creationals\Maze\Room(3));
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof \GOF\Creationals\Maze\NotFoundException, __LINE__);
            return;
        }   
        
        $this->fail('Non existing room returned');
    }
    
}

?>