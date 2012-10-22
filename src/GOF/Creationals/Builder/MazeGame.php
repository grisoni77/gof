<?php

namespace GOF\Creationals\Builder;

/**
 * The Director (uses a builder instance)
 *
 * @author cris
 */
class MazeGame 
{
    public function createMaze(AbstractMazeBuilder $builder)
    {
        $builder->buildMaze();
        $builder->buildRoom(1);
        $builder->buildRoom(2);
        $builder->buildDoor(1, 2, \GOF\Creationals\Maze\RoomInterface::EAST);
        
        return $builder->getMaze();
    }
}

?>