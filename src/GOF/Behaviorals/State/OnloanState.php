<?php

namespace GOF\Behaviorals\State;

use GOF\Behaviorals\State\AbstractState;

/**
 * Description of AvailableState
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
class OnloanState extends AbstractState
{
    private $possessor; 
    
    public function setPossessor($name)
    {
        $this->possessor = $name;
    }
    
    public function getPossessor()
    {
        return $this->possessor;
    }

    public function getDescription()
    {
        return AbstractState::ONLOAN;
    }
    
    public function returnBack()
    {
        $state = new AvailableState($this->book);
        $this->book->setState($state);
    }
}
