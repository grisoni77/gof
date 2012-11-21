<?php

namespace GOF\Structurals\Composite;

/**
 * Description of Elector
 *
 * @author cris
 */
class Elector extends Voter
{
    private $gender;
    private $vote;
    
    public function __construct($name, $gender, $vote)
    {
        parent::__construct($name);
        $this->gender   = $gender;
        $this->vote     = $vote;
    }

    public function getFemales() 
    {
        return $this->gender == 'F' ? 1 : 0;
    }
    public function getMales() 
    {
        return $this->gender == 'M' ? 1 : 0;
    }
    public function getVotes() 
    {
        return array($this->vote => 1);
    }

    public function getReport() 
    {
        return sprintf('%-10s (%s) voted for %s', 
                $this->name, $this->gender, $this->vote);
    }
}

?>