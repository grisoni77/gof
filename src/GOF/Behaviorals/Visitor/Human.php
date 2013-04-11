<?php

namespace GOF\Behaviorals\Visitor;

use GOF\Behaviorals\Visitor\Animal;

/**
 * Description of Dog
 *
 * @author 71537
 */
class Human extends Animal
{
    protected $is_sleepless;
    
    public function __construct()
    {
        $this->is_sleepless = false;
    }
    
    public function isSleepless()
    {
        return $this->is_sleepless;
    }
    
    public function setSleepless()
    {
        $this->is_sleepless = true;
    }
    
    public function accept(Visitor $v) {
        if (method_exists($v, 'visitHuman')) {
            $v->visitHuman($this);
        }
    }

}

?>