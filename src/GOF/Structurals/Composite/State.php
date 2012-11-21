<?php

namespace GOF\Structurals\Composite;

/**
 * Description of State
 *
 * @author cris
 */
class State extends Composite
{
    public function getReport() 
    {
        $votes = $this->getVotes();
        $func = function($k) use ($votes) {
            return sprintf("%s=%d", $k, $votes[$k]);
        };
        return sprintf("State %11s - M|F=%d|%d - %s",
                $this->name, $this->getMales(), $this->getFemales(),
                implode('|', array_map($func, array_keys($votes)))
        );
    }
    
    public function printFullReport() 
    {
        $line = "---------------------------------------\n";
        echo "\n";
        echo $this->getReport();
        echo "\n";
        echo $line;
        echo "\n";
        foreach ($this as $county) {
            echo $county->getReport();
            echo "\n";
            echo $line;
            foreach ($county as $elector) {
                echo $elector->getReport();
                echo "\n";
            }
            echo "\n";
        }
    }
}

?>