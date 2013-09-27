<?php

namespace GOF\Behaviorals\State;

use GOF\Behaviorals\State\Book;
use GOF\Behaviorals\State\AvailableState;

/**
 * Description of BookFactory
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
class BookFactory 
{
    static function createBook($name)
    {
        $book = new Book($name);
        $book->setState(new AvailableState($book));
        return $book;
    }
}
