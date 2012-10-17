<?php

namespace GOF\Creationals\Maze;

/**
 * Description of Maze
 *
 * @author cris
 */
class Maze 
{
    protected $rooms;
    
    public function __construct()
    {
        $this->rooms = array();
    }
    
    /**
     *
     * @param \GOF\Creationals\Maze\Room $r 
     */
    public function addRoom(Room $r)
    {
        $this->rooms[$r->getNumber()] = $r;
    }
        
    /**
     *
     * @param int $number
     * @return \GOF\Creationals\Maze\Room 
     */
    public function getRoomByNumber($number)
    {
        return $this->rooms[$number];
    }
}

?>