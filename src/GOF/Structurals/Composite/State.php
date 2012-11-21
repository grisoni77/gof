<?php

namespace GOF\Structurals\Composite;

/**
 * Description of State
 *
 * @author cris
 */
class State extends Composite
{
    private $name;
    
    public function __construct($name)
    {
        parent::__construct();
        $this->name = $name;
    }

    public function getId() {
        return md5($this->name);
    }

    public function getReport() 
    {
        $votes = $this->getVotes();
        $func = function($k) use ($votes) {
            return sprintf("%s=%d", $k, $votes[$k]);
        };
        return sprintf("State %s - M|F=%d|%d - %s",
                $this->name, $this->getMales(), $this->getFemales(),
                implode('|', array_map($func, array_keys($votes)))
        );
    }
    
}

?>