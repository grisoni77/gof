<?php

namespace GOF\Structurals\Bridge;

/**
 * Concrete class for bridge implementor
 *
 * @author cris
 */
class FacebookAuthenticationProvider extends AuthenticationProvider
{
    public function authenticate($user, $pass) 
    {
        // @TODO use mock objects...
        return $user=='cris' && $pass=='mypass';
    }
}

?>