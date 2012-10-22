<?php

namespace GOF\Creationals\Maze;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author cris
 */
interface RoomInterface extends MapSite
{
    const NORTH = 1;
    const EAST = 2;
    const SOUTH = 3;
    const WEST = 4;
    
    /**
     *
     * @return int
     */
    public function getNumber();
    
    /**
     *
     * @param int $direction
     * @param \GOF\Creationals\Maze\MapSite $side 
     */
    public function setSide($direction, MapSite $side);
    
    /**
     *
     * @param int $direction
     * @return \GOF\Creationals\Maze\MapSite 
     */
    public function getSide($direction);
    
    /**
     * Return adjacent direction to $direction
     * 
     * @param int $direction
     * @return int oposite direction 
     */
    public function getAdjacentDirection($direction);
}

?>
