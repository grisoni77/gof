<?php

namespace GOF\Structurals\Composite;

/**
 * Description of Voter
 *
 * @author cris
 */
abstract class Voter 
{
    abstract public function getId();
    
    // operations
    abstract public function getReport();
    abstract public function getVotes();
    abstract public function getMales();
    abstract public function getFemales();
}

?>