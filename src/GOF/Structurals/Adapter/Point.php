<?php

namespace GOF\Structurals\Adapter;

/**
 * Description of Point
 *
 * @author cris
 */
class Point 
{
    private $x, $y;
    
    public function setX($x) { $this->x = $x; }
    public function setY($y) { $this->y = $y; }
    
    public function getX() { return $this->x; }
    public function getY() { return $this->y; }
    
    /**
     *
     * @param int $x
     * @param int $y
     * @return \GOF\Structurals\Adapter\Point 
     */
    public static function getPoint($x, $y)
    {
        $p = new Point();
        $p->setX($x);
        $p->setY($y);
        return $p;
    }
}

?>