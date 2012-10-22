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
}

?>
