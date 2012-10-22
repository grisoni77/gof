<?php

namespace GOF\Creationals\Builder;

use GOF\Creationals\Builder\AbstractMazeBuilder;

/**
 * Description of StandardMazeBuilder
 *
 * @author cris
 */
class CountingMazeBuilder extends AbstractMazeBuilder
{
    protected $rooms;
    protected $doors;
    
    public function __construct()
    {
        $this->rooms = 0;
        $this->doors = 0;
    }
    
    /**
     * @inheritdoc 
     */
    public function buildRoom($number)
    {
        $this->rooms++;
    }
    
    /**
     * @inheritdoc 
     */
    public function buildDoor($r1, $r2, $direction)
    {
        $this->doors++;
    }
    
    public function getCounts()
    {
        return array(
            'doors' => $this->doors,
            'rooms' => $this->rooms,
        );
    }
}

?>