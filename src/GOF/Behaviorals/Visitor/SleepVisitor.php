<?php

namespace GOF\Behaviorals\Visitor;

use GOF\Behaviorals\Visitor\Visitor;

/**
 * Description of CountSpeciesVisitor
 *
 * @author 71537
 */
class SleepVisitor implements Visitor
{
    const AWAKE = 0;
    const ASLEEP = 1;
    
    public function visitDog(Dog $dog) 
    {
        // watch dogs never sleep :)
        if (!$dog->isWatchDog()) {
            $dog->setState(self::ASLEEP);
        }
    }

    public function visitHuman(Human $human) 
    {
        // if insonniac let awake
        if (!$human->isSleepless()) {
            $human->setState(self::ASLEEP);
        }
    }

    public function visitSpider(Spider $spider) 
    {
        // do nothing... have you ever seen an asleep spider? 
    }
}

?>