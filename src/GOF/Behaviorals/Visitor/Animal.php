<?php

namespace GOF\Behaviorals\Visitor;


/**
 * Description of Animal
 *
 * @author 71537
 */
abstract class Animal implements Visitable
{
    protected $state;
    
    public function getState()
    {
        return $this->state;
    }
    
    public function setState($state)
    {
        $this->state = $state;
    }
}

?>