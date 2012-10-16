<?php

namespace GOF\Creationals\Maze;

/**
 * Description of Door
 *
 * @author cris
 */
class Door implements MapSite
{
    protected $room1;
    protected $room2;

    /**
     *
     * @param \GOF\Creationals\Maze\Room $r1
     * @param \GOF\Creationals\Maze\Room $r2 
     */
    public function __construct(Room $r1, Room $r2) 
    {
        $this->room1 = $r1;
        $this->room2 = $r2;
    }
    
    /**
     *
     * @param \GOF\Creationals\Maze\Room $r
     * @return mixed 
     */
    public function getOtherSideFrom(Room $r)
    {
        $number = $r->getNumber();
        if ($number == $this->room1->getNumber()) {
            return $this->room1;
        } elseif ($number == $this->room2->getNumber()) {
            return $this->room2;
        } else {
            return false;
        }
    }
    
    //put your code here
    public function enter() {
        
    }
}

?>