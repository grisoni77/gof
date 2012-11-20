<?php

namespace GOF\Structurals\Adapter;

/**
 * Description of Shape
 *
 * @author cris
 */
abstract class Shape 
{
    /**
     * @return array of Point 
     */
    abstract public function getBoundingBox();
    
    
    abstract public function createManipulator();
}

?>