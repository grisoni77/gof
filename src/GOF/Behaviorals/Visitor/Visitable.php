<?php

namespace GOF\Behaviorals\Visitor;

/**
 *
 * @author 71537
 */
interface Visitable 
{
    public function accept(Visitor $v);
}

?>
