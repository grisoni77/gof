<?php

namespace GOF\Behaviorals\Visitor;

/**
 * Description of Visitor
 *
 * @author 71537
 */
interface Visitor 
{
    public function visitHuman(Human $human);
    public function visitDog(Dog $dog);
    public function visitSpider(Spider $spider);
}

?>