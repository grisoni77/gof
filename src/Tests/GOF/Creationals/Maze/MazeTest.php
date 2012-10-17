<?php

/**
 * Description of MazeTest
 *
 * @author cris
 */
class MazeTest extends \Tests\GOF\GOFTestCase
{
    public function testMaze()
    {
        $game = new GOF\Creationals\Maze\MazeGame();
        $maze = $game->createMaze();
        $this->assertTrue($maze instanceof GOF\Creationals\Maze\Maze, __LINE__);
        
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
}

?>
