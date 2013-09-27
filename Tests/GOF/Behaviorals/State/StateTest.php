<?php

namespace Tests\GOF\Behaviorals\State;

use GOF\Behaviorals\State\BookFactory;
use GOF\Behaviorals\State\AbstractState;

/**
 * Description of StateTest
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
class StateTest extends \Tests\GOF\GOFTestCase
{
    public function testCreateBook()
    {
        $book = BookFactory::createBook('The treasure island');
        $this->assertEquals(AbstractState::AVAILABLE, $book->getState());
    }
    
    public function testLendBook()
    {
        $book = BookFactory::createBook('The treasure island');
        $book->lend('John Doe');
        $this->assertEquals(AbstractState::ONLOAN, $book->getState());
        $this->assertEquals('John Doe', $book->getPossessor());
    }
    
    /**
     * @expectedException Gof\Behaviorals\State\NotAllowedException
     */
    public function testCannotLendBookOnLoan()
    {
        $book = BookFactory::createBook('The treasure island');
        $book->lend('John Doe');
        $book->lend('Paul Smith');
    }
    
    /**
     * @expectedException Gof\Behaviorals\State\NotAllowedException
     */
    public function testCannotReturnBookAvailableBack()
    {
        $book = BookFactory::createBook('The treasure island');
        $book->returnBack();
    }
    
}
