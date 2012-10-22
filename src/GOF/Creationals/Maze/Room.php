<?php

namespace GOF\Creationals\Maze;

/**
 * Description of Room
 *
 * @author cris
 */
class Room implements RoomInterface
{
    const NORTH = 1;
    const EAST = 2;
    const SOUTH = 3;
    const WEST = 4;
    
    protected $number;
    protected $sides;
    
    public function __construct($number) 
    {
        $this->number = $number;
        $this->sides = array();
    }
    
    public function enter() {}
    
    /**
     *
     * @return int
     */
    public function getNumber() 
    {
        return $this->number;
    }
    
    /**
     *
     * @param int $direction
     * @param \GOF\Creationals\Maze\MapSite $side 
     */
    public function setSide($direction, MapSite $side) 
    {
        $this->sides[$direction] = $side;
    }
    
    /**
     *
     * @param int $direction
     * @return \GOF\Creationals\Maze\MapSite 
     */
    public function getSide($direction)
    {
        return array_key_exists($direction, $this->sides) ? $this->sides[$direction] : false;
    }
}

?>