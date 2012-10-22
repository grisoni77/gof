<?php

namespace Tests\GOF\Creationals\Builder;

/**
 * Description of EnchantedMazeBuilderTest
 *
 * @author cris
 */
class EnchantedMazeBuilderTest extends \Tests\GOF\GOFTestCase
{
    /* @var $game \GOF\Creationals\Builder\MazeGame */
    protected $game;
    /* @var $builder \GOF\Creationals\Builder\EnchantedAbstractBuilder */
    protected $builder;
    /* @var $maze \GOF\Creationals\Maze\Maze */
    protected $maze;
    
    public function setUp()
    {
        $this->game = new \GOF\Creationals\Builder\MazeGame();
        $this->builder = new \GOF\Creationals\Builder\EnchantedMazeBuilder();
        $this->maze = $this->game->createMaze($this->builder);
    }
    
    public function testMaze()
    {
        $this->assertTrue($this->maze instanceOf \GOF\Creationals\Maze\Maze, __LINE__);
    }
    
    public function testRoom1()
    {
        $r1 = $this->maze->getRoomByNumber(1);
        $this->assertTrue($r1 instanceOf \GOF\Creationals\Maze\EnchantedRoom, __LINE__);
    }
    
    public function testDoor()
    {
        $r1 = $this->maze->getRoomByNumber(1);
        $door = $r1->getSide(\GOF\Creationals\Maze\RoomInterface::EAST);
        $this->assertTrue($door instanceOf \GOF\Creationals\Maze\DoorNeedingSpell, __LINE__);
    }
    
}