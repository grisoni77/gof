<?php

namespace GOF\Behaviorals\State;

use GOF\Behaviorals\State\NotAllowedException;
use GOF\Behaviorals\State\BookInterface;

/**
 * Description of AbstractState
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
abstract class AbstractState implements BookInterface
{
    const ONLOAN = 'Onloan';
    const AVAILABLE = 'Available';
    
    
    protected $book;
    
    public function __construct(BookInterface $book)
    {
        $this->book = $book;
    }

    /**
     * @return string
     */
    abstract public function getDescription();
    
    
    public function lend($name)
    {
        throw new NotAllowedException('Not allowed action');
    }
    
    public function getPossessor()
    {
        throw new NotAllowedException('Not allowed action');
    }
    
    public function returnBack()
    {
        throw new NotAllowedException('Not allowed action');
    }
}
