<?php

namespace Tests\GOF\Creationals\Builder;

/**
 * Description of MazeFactoryTest
 *
 * @author cris
 */
class StandardMazeBuilderTest extends \Tests\GOF\GOFTestCase
{
    /* @var $game \GOF\Creationals\Builder\MazeGame */
    protected $game;
    /* @var $builder \GOF\Creationals\Builder\StandardAbstractBuilder */
    protected $builder;
    /* @var $maze \GOF\Creationals\Maze\Maze */
    protected $maze;
    
    public function setUp()
    {
        $this->game = new \GOF\Creationals\Builder\MazeGame();
        $this->builder = new \GOF\Creationals\Builder\StandardMazeBuilder();
        $this->maze = $this->game->createMaze($this->builder);
    }
    
    public function testMaze()
    {
        $this->assertTrue($this->maze instanceOf \GOF\Creationals\Maze\Maze, __LINE__);
    }
    
    public function testRoom1()
    {
        $r1 = $this->maze->getRoomByNumber(1);
        $this->assertTrue($r1 instanceOf \GOF\Creationals\Maze\Room, __LINE__);
    }
    
    public function testDoor()
    {
        $r1 = $this->maze->getRoomByNumber(1);
        $door = $r1->getSide(\GOF\Creationals\Maze\RoomInterface::EAST);
        $this->assertTrue($door instanceOf \GOF\Creationals\Maze\Door, __LINE__);
    }
    
    public function testroomDoorSide()
    {
        $r1 = $this->maze->getRoomByNumber(1);
        $door = $r1->getSide(\GOF\Creationals\Maze\RoomInterface::EAST);
        $r2 = $door->getOtherSideFrom($r1);
        $this->assertEquals($r2->getNUmber(), 2, __LINE__);
    }
    
}