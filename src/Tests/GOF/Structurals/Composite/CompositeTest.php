<?php

namespace Tests\GOF\Structurals\Composite;

/**
 * Description of CompositeTest
 *
 * @author cris
 */
class CompositeTest extends \Tests\GOF\GOFTestCase
{
    private $state;
    
    public function setUp()
    {
        // create state
        $state = new \GOF\Structurals\Composite\State('Alabama');
        // create counties
        $c1 = new \GOF\Structurals\Composite\County('Jefferson');
        $c2 = new \GOF\Structurals\Composite\County('Mobile');
        $state->add($c1);
        $state->add($c2);
        // create electors
        $c1->add(new \GOF\Structurals\Composite\Elector('Bob',      'M', 'R'));
        $c1->add(new \GOF\Structurals\Composite\Elector('Maria',    'F', 'R'));
        $c1->add(new \GOF\Structurals\Composite\Elector('Paul',     'M', 'D'));
        $c1->add(new \GOF\Structurals\Composite\Elector('Sandy',    'F', 'R'));
        $c2->add(new \GOF\Structurals\Composite\Elector('Matt',     'M', 'R'));
        $c2->add(new \GOF\Structurals\Composite\Elector('Mark',     'M', 'D'));
        $c2->add(new \GOF\Structurals\Composite\Elector('Sandrah',  'F', 'D'));
        $c2->add(new \GOF\Structurals\Composite\Elector('Robert',   'M', 'R'));
        //setUp
        $this->state = $state;
    }
    
    public function testGender()
    {
        /*
        \set_error_handler(function($code, $msg,$f,$line) {die($msg.' '.$f.' '.$line);});
        foreach ($this->state as $county) {
            echo $county->getReport();
        }
        */
        $males      = $this->state->getMales();
        $females    = $this->state->getFemales();
        $this->assertEquals(5, $males, __LINE__);
        $this->assertEquals(3, $females, __LINE__);
    }
    
    public function testVotes()
    {
        $votes = $this->state->getVotes();
        $this->assertEquals(5, $votes['R'], __LINE__);
        $this->assertEquals(3, $votes['D'], __LINE__);
    }
    
    public function testReports()
    {
        $this->assertEquals('State Alabama - M|F=5|3 - R=5|D=3', $this->state->getReport());
        $c1 = $this->state->getIterator()->offsetGet(md5('Jefferson'));
        $this->assertEquals('County Jefferson - M|F=2|2 - R=3|D=1', $c1->getReport());
        $c2 = $this->state->getIterator()->offsetGet(md5('Mobile'));
        $this->assertEquals('County Mobile - M|F=3|1 - R=2|D=2', $c2->getReport());
        /*
        foreach ($this->state as $county) {
            $this->assertEquals('County Alabama - M|F=5|3 - R=5|D=3', $this->state->getReport());
            echo $county->getReport();
        }
        */
    }
}

?>