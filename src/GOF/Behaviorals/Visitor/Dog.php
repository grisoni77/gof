<?php

namespace GOF\Behaviorals\Visitor;

use GOF\Behaviorals\Visitor\Animal;

/**
 * Description of Dog
 *
 * @author 71537
 */
class Dog extends Animal
{
    protected $is_watch_dog;
    
    public function __construct()
    {
        $this->is_watch_dog = false;
    }
    
    public function isWatchDog()
    {
        return $this->is_watch_dog;
    }
    
    public function prepareToWatch()
    {
        $this->is_watch_dog = true;
    }
    
    public function accept(Visitor $v) {
        if (method_exists($v, 'visitDog')) {
            $v->visitDog($this);
        }
    }
}

?>