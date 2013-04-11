<?php

namespace Tests\GOF\Behaviorals\Visitor;

use GOF\Behaviorals\Visitor\Dog;
use GOF\Behaviorals\Visitor\Spider;
use GOF\Behaviorals\Visitor\Human;

use GOF\Behaviorals\Visitor\CountLegsVisitor;
use GOF\Behaviorals\Visitor\SleepVisitor;

/**
 * Description of CompositeTest
 *
 * @author cris
 */
class VisitorTest extends \Tests\GOF\GOFTestCase
{
    public function testCountLegs()
    {
        $zoo = new \ArrayObject();
        $zoo->append(new Dog());
        $zoo->append(new Dog());
        $zoo->append(new Human());
        $zoo->append(new Spider());
        $zooIterator = $zoo->getIterator();
        $visitor = new CountLegVisitor();
        foreach ($zooIterator as $a) {
            $a->accept($visitor);
        }
        $this->assertEquals(18, $visitor->getTotalLegs(), __LINE__);
    }
    
    public function testSleepVisitorInsomniacHuman()
    {
        $human = new Human();
        $human->setSleepless();
        $visitor = new SleepVisitor();
        $human->accept($visitor);
        $this->assert(SleepVisitor::AWAKE, $human->getState());
    }

    public function testSleepVisitorSaneHuman()
    {
        $human = new Human();
        $visitor = new SleepVisitor();
        $human->accept($visitor);
        $this->assert(SleepVisitor::ASLEEP, $human->getState());
    }

    /**
     * @depends testSleepVisitorSaneHuman
     */
    public function testSleepVisitorSaneAsleepHuman()
    {
        $human = new Human();
        $visitor = new SleepVisitor();
        $human->accept($visitor);
        $human->accept($visitor);
        $this->assert(SleepVisitor::ASLEEP, $human->getState());
    }
    
    public function testSleepVisitorWatchDog()
    {
        $dog = new Dog();
        $dog->prepareToWatch();
        $visitor = new SleepVisitor();
        $dog->accept($visitor);
        $this->assert(SleepVisitor::AWAKE, $dog->getState());
    }

    public function testSleepVisitorDog()
    {
        $dog = new Dog();
        $visitor = new SleepVisitor();
        $dog->accept($visitor);
        $this->assert(SleepVisitor::ASLEEP, $dog->getState());
    }

    /**
     * @depends testSleepVisitorDog
     */
    public function testSleepVisitorSaneAsleepDog()
    {
        $dog = new Dog();
        $visitor = new SleepVisitor();
        $dog->accept($visitor);
        $dog->accept($visitor);
        $this->assert(SleepVisitor::ASLEEP, $dog->getState());
    }
    
    public function testSleepVisitorSpider()
    {
        $spider = new Spider();
        $state = $spider->getState();
        $visitor = new SleepVisitor();
        $spider->accept($visitor);
        $this->assertEquals($state, $spider->getState());
    }
}

?>