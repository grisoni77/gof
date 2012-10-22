<?php

namespace GOF\Creationals\Maze;

//use GOF\Creationals\Maze\NotFoundException;

/**
 * Description of Door
 *
 * @author cris
 */
class Door implements DoorInterface
{
    protected $room1;
    protected $room2;

    /**
     *
     * @param \GOF\Creationals\Maze\RoomInterface $r1
     * @param \GOF\Creationals\Maze\RoomInterface $r2 
     */
    public function __construct(RoomInterface $r1, RoomInterface $r2) 
    {
        $this->room1 = $r1;
        $this->room2 = $r2;
    }
    
    /**
     *
     * @param \GOF\Creationals\Maze\RoomInterface $r
     * @return \GOF\Creationals\Maze\RoomInterface
     * 
     */
    public function getOtherSideFrom(RoomInterface $r)
    {
        $number = $r->getNumber();
        if ($number == $this->room1->getNumber()) {
            return $this->room2;
        } elseif ($number == $this->room2->getNumber()) {
            return $this->room1;
        } else {
            throw new NotFoundException(sprintf('The room n°%d is not adjacent to this wall', $number), 404);
        }
    }
    
    //put your code here
    public function enter() {
        
    }
}

?>