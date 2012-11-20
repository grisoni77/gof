<?php

namespace GOF\Structurals\Adapter;

/**
 * Description of LineShape
 *
 * @author cris
 */
class LineShape extends Shape
{
    /**
     * Point A
     * 
     * @var \GOF\Structurals\Adapter\Point  
     */
    private $a;
    
    /**
     * Point B
     * 
     * @var \GOF\Structurals\Adapter\Point  
     */
    private $b;
    
    public function __construct($x1, $y1, $x2, $y2)
    {
        $this->a = Point::getPoint($x1, $y1);
        $this->b = Point::getPoint($x2, $y2);
    }

    public function createManipulator() {
    }

    public function getBoundingBox() 
    {
        return array($this->a, $this->b);
    }
    
       
}

?>