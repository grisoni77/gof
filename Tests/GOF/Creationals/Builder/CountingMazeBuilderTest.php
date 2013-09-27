<?php

namespace Tests\GOF\Creationals\Builder;

/**
 * Description of CountingMazeBuildertest
 *
 * @author cris
 */
class CountingMazeBuilderTest extends \Tests\GOF\GOFTestCase
{
    /* @var $game \GOF\Creationals\Builder\MazeGame */
    protected $game;
    /* @var $builder \GOF\Creationals\Builder\CountingAbstractBuilder */
    protected $builder;
    /* @var $counts array */
    protected $counts;
    
    public function setUp()
    {
        $this->game = new \GOF\Creationals\Builder\MazeGame();
        $this->builder = new \GOF\Creationals\Builder\CountingMazeBuilder();
        $this->game->createMaze($this->builder);
        $this->counts =  $this->builder->getCounts();
    }
    
    public function testDoors()
    {
        $this->assertEquals($this->counts['doors'], 1, __LINE__);
    }
    
    public function testRooms()
    {
        $this->assertEquals($this->counts['rooms'], 2, __LINE__);   
    }
}

?>