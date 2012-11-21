<?php

namespace GOF\Structurals\Composite;

/**
 * Description of County
 *
 * @author cris
 */
class County extends Composite
{
    public function getReport() 
    {
        $votes = $this->getVotes();
        $func = function($k) use ($votes) {
            return sprintf("%s=%d", $k, $votes[$k]);
        };
        return sprintf("County %10s - M|F=%d|%d - %s",
                $this->name, $this->getMales(), $this->getFemales(),
                implode('|', array_map($func, array_keys($votes)))
        );
    }
    
}


?>