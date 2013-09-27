<?php

namespace GOF\Behaviorals\State;

use GOF\Behaviorals\State\BookInterface;
use GOF\Behaviorals\State\AbstractState;


/**
 * Description of Book
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
class Book implements BookInterface
{
    /**
     * @var \GOF\Behaviorals\State\AbstractState
     */
    private $state;

    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function setState(AbstractState $state)
    {
        $this->state = $state;
    }
    
    public function getState()
    {
        return $this->state->getDescription();
    }
    
    /**
     * @inherit
     */
    public function getPossessor()
    {
        return $this->state->getPossessor();
    }

    /**
     * @inherit
     */
    public function lend($lender)
    {
        $this->state->lend($lender);
    }    

    /**
     * @inherit
     */
    public function returnBack()
    {
        $this->state->returnBack();
    }    
}
