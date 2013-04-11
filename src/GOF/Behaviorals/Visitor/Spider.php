<?php

namespace GOF\Behaviorals\Visitor;

use GOF\Behaviorals\Visitor\Animal;

/**
 * Description of Dog
 *
 * @author 71537
 */
class Spider extends Animal
{
    const A_SPIDER_STATE = 1;
    const ANOTHER_SPIDER_STATE = 2;
    
    public function __construct()
    {
        $this->setState(self::A_SPIDER_STATE);
    }
    
    public function accept(Visitor $v) {
        if (method_exists($v, 'visitSpider')) {
            $v->visitSpider($this);
        }
    }

}

?>