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
interface DoorInterface extends MapSite
{
        /**
     *
     * @param \GOF\Creationals\Maze\RoomInterface $r
     * @return \GOF\Creationals\Maze\RoomInterface
     * 
     */
    public function getOtherSideFrom(RoomInterface $r);
    
}

?>
