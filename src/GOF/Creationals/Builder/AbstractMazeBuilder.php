<?php

namespace GOF\Creationals\Builder;

/**
 * AbstractMazeBuilder 
 * (all empty methods, let the clients override only methods they're interested in)
 *
 * @author cris
 */
abstract class AbstractMazeBuilder 
{
    protected $_currentMaze;
    
    public function __construct() 
    {
        $this->_currentMaze = null;
    }
    
    /**
     * Build Maze object
     */
    public function buildMaze()
    {
        
    }
    
    /**
     * Build Room object
     * 
     * @param int $number 
     */
    public function buildRoom($number) 
    {
        
    }
    
    /**
     * Build Door object
     * 
     * @param int $r1
     * @param int $r2 
     * @param int $direction
     */
    public function buildDoor($r1, $r2, $direction)
    {
        
    }
    
    /**
     * Return current built maze
     * 
     * @return \GOF\Creationals\Maze\Maze
     */
    public function getMaze()
    {
        return $this->_currentMaze;
    }
}

?>