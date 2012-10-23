<?php

namespace Tests\GOF\Creationals\FactoryMethod;

use GOF\Creationals\Maze\RoomInterface;

/**
 * Description of MazeFactoryTest
 *
 * @author cris
 */
class CreateMazeTest extends \Tests\GOF\GOFTestCase
{
    protected $mazegame;
    protected $roomClass;
    protected $doorClass;
    
    public function setUp()
    {
        $this->roomClass = new \ReflectionClass('\\GOF\\Creationals\\Maze\\Room');
        $this->mazegame = new \GOF\Creationals\FactoryMethod\MazeGame();
    }
    
    public function testMakeMaze()
    {
        $maze = $this->mazegame->makeMaze();
        $this->assertTrue($maze instanceof \GOF\Creationals\Maze\Maze, __LINE__);
    }
    
    public function testMakeRoom()
    {
        $room1 = $this->mazegame->makeRoom(1);
        $this->assertTrue($room1 instanceof \GOF\Creationals\Maze\Room, __LINE__);
        $this->assertTrue($this->roomClass->isInstance($room1));
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
    }
    
    public function testMakeWall()
    {
        $wall = $this->mazegame->makeWall();
        $this->assertTrue($wall instanceof \GOF\Creationals\Maze\Wall, __LINE__);
    }
    
    public function testDoor()
    {
        $room1 = $this->mazegame->makeRoom(1);
        $room2 = $this->mazegame->makeRoom(2);
        $door = $this->mazegame->makeDoor($room1, $room2);
        $this->assertTrue($this->doorClass->isInstance($door), __LINE__);
    }
    
    public function testGetOtherSideFrom()
    {
        $maze = $this->mazegame->createMaze();
        $room1 = $maze->getRoomByNumber(1);
        $door = $room1->getSide(RoomInterface::EAST);
        
        $room2 = $door->getOtherSideFrom($room1);
        $this->assertTrue($this->roomClass->isInstance($room2), __LINE__);
        $this->assertEquals($room2->getNumber(), 2, __LINE__);
        
        $room1 = $door->getOtherSideFrom($room2);
        $this->assertTrue($this->roomClass->isInstance($room1), __LINE__);
        $this->assertEquals($room1->getNumber(), 1, __LINE__);
        
    }
    
    public function testNotFoundException()
    {
        $maze = $this->mazegame->createMaze();
        $room1 = $maze->getRoomByNumber(1);
        $door = $room1->getSide(RoomInterface::EAST);
        
        try {
            $room3 = $door->getOtherSideFrom($this->mazegame->makeRoom(3));
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof \GOF\Creationals\Maze\NotFoundException, __LINE__);
            return;
        }  
        
        $this->fail('Non existing room returned');
    }
    
}

?>