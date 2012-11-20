<?php

namespace GOF\Structurals\Adapter;

/**
 * Description of TextView
 *
 * @author cris
 */
class TextView 
{
    /**
     * Left-Top origin point
     * 
     * @var \GOF\Structurals\Adapter\Point  
     */
    private $origin;
    
    /**
     * Width
     * 
     * @var int 
     */
    private $width;
    
    /**
     * Height
     * 
     * @var int 
     */
    private $height;
    
    public function getWidth() { return $this->width; }
    public function getHeight() { return $this->height; }
    public function getOrigin() { return $this->origin; }
    
    public function __construct($x, $y, $w, $h)
    {
        $this->origin = Point::getPoint($x, $y);
        $this->width = $w;
        $this->height = $h;
    }
    
    public function getExtent()
    {
        return array(
            'width'  => $this->width,
            'height' => $this->height
        );
    }
}

?>