<?php

namespace GOF\Behaviorals\State;
/**
 *
 * @author Cristiano Cucco <cristiano dot cucco at gmail dot com>
 */
interface BookInterface
{
    /**
     * Book Lending action 
     * @param string $lender lender name
     */
    public function lend($lender);
    
    /**
     * Return current possessor name
     * @return string possessor name
     */
    public function getPossessor();
    
    /**
     * Book returning action 
     */
    public function returnBack();
    
}

?>
