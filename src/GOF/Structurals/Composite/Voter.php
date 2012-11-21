<?php

namespace GOF\Structurals\Composite;

/**
 * Description of Voter
 *
 * @author cris
 */
abstract class Voter 
{
    protected $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getId() {
        return md5($this->name);
    }
    
    // operations
    abstract public function getReport();
    abstract public function getVotes();
    abstract public function getMales();
    abstract public function getFemales();
}

?>