<?php

namespace GOF\Structurals\Composite;

/**
 * Description of Composite
 *
 * @author cris
 */
abstract class Composite extends Voter implements \IteratorAggregate
{
    private $children;
    private $males;
    private $females;
    private $votes;
    
    public function __construct($name)
    {
        parent::__construct($name);
        $this->children = new \ArrayObject(array());
        $this->males    = null;
        $this->females  = null;
        $this->votes    = null;
    }
    
    // Composite methods
    public function add(Voter $voter) 
    {
        $this->getIterator()->offsetSet($voter->getId(), $voter);
    }
    
    public function remove(Voter $voter)
    {
        $this->getIterator()->offsetUnset($voter->getId());
    }
    
    // IteratorAggregate methods
    public function getIterator() {
        return $this->children->getIterator();
    }
    
    // Operations
    public function getFemales() 
    {
        if (is_null($this->females)) 
        {
            $this->getIterator()->rewind();
            $count = 0;
            foreach ($this as $voter) {
                $count += $voter->getFemales();
            }
            $this->females = $count;
        }
        return $this->females;
    }

    public function getMales() 
    {
        if (is_null($this->males)) 
        {
            $this->getIterator()->rewind();
            $count = 0;
            foreach ($this as $voter) {
                $count += $voter->getMales(); 
            }
            $this->males = $count;
        }
        return $this->males;        
    }

    public function getVotes() 
    {
        if (is_null($this->votes)) 
        {
            $this->getIterator()->rewind();
            $count = array();
            foreach ($this as $voter) {
                $votes = $voter->getVotes();
                foreach ($votes as $k=>$v) {
                    if (!isset($count[$k])) {
                        $count[$k] = 0;
                    } 
                    $count[$k] += $v;
                }
            }
            $this->votes = $count;
        }
        return $this->votes;        
    }    
    
}

?>