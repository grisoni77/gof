<?php

namespace GOF\Structurals\Bridge;

/**
 * Abstract class for bridge implementor
 *
 * @author cris
 */
abstract class AuthenticationProvider 
{
    /**
     * @return bool 
     */
    abstract public function authenticate($user, $pass);
}

?>