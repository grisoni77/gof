<?php

namespace GOF\Behaviorals\Visitor;

use GOF\Behaviorals\Visitor\Visitor;

/**
 * Description of CountLegsVisitor
 *
 * @author 71537
 */
class CountLegsVisitor implements Visitor
{
    private $total_legs;
    
    public function __construct() {
        $this->total_legs = 0;
    }    
    
    public function getTotalLegs()
    {
        return $this->total_legs;
    }

    public function visitDog(Dog $dog) 
    {
        $this->total_legs += 4;
    }

    public function visitHuman(Human $human) 
    {
        $this->total_legs += 2;
    }

    public function visitSpider(Spider $spider) 
    {
        $this->total_legs += 8;
    }
}

?>