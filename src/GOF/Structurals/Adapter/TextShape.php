<?php

namespace GOF\Structurals\Adapter;

/**
 * Adapter to TextView
 * Adapt getExtent and getOrigin to getBoundingBox
 *
 * @author cris
 */
class TextShape extends Shape
{
    private $text_view;
    
    public function __construct(TextView $text_view) 
    {
        $this->text_view = $text_view;
    }

    public function createManipulator() {
        
    }

    public function getBoundingBox() 
    {
        $origin = $this->text_view->getOrigin();
        $extent = $this->text_view->getExtent();
        return array(
            $origin,
            Point::getPoint($origin->getX()+$extent['width'], 
                    $origin->getY()+$extent['height'])
        );        
    }
        
    
}

?>