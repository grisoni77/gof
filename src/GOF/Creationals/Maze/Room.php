<?php

namespace GOF\Creationals\Maze;

/**
 * Description of Room
 *
 * @author cris
 */
class Room implements RoomInterface
{
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

    /**
     * @inheritdoc
     */
    public function getAdjacentDirection($direction) 
    {
        switch ($direction)
        {
            case RoomInterface::NORTH:
                return RoomInterface::SOUTH;
                break;
            
            case RoomInterface::EAST:
                return RoomInterface::WEST;
                break;
            
            case RoomInterface::SOUTH:
                return RoomInterface::NORTH;
                break;
            
            case RoomInterface::WEST:
                return RoomInterface::EAST;
                break;
            
            default:
                throw new NotFoundException('This direction code does not exist: '.$direction, 400);
        }
    }
}

?>