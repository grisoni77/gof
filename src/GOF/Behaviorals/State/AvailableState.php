<?php

namespace GOF\Behaviorals\State;

use GOF\Behaviorals\State\AbstractState;

/**
 * Description of AvailableState
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
class AvailableState extends AbstractState
{
    public function getPossessor()
    {
        return 'None';
    }
    
    public function lend($name)
    {
        $state = new OnloanState($this->book);
        $state->setPossessor($name);
        $this->book->setState($state);
    }
    
    
    public function getDescription()
    {
        return AbstractState::AVAILABLE;
    }
}
