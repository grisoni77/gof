<?php

namespace GOF\Structurals\Bridge;

/**
 * Bridge abstraction class with external Authentication provider
 *
 * @author cris
 */
class UserProvider 
{
    
    private $auth_provider;
    
    public function __construct(AuthenticationProvider $provider) 
    {
        $this->auth_provider = $provider;
    }
    
    public function getUserByUsername($username)
    {
        // simulate fetch from user storage
        return new User(strlen($username), $username);
    }
    
    /**
     * Authenticate user against user/pass credentials
     * 
     * @param type $user
     * @param type $pass 
     * @return bool true
    */
    public function userLogin($user, $pass)
    {
        return $this->auth_provider->authenticate($user, $pass);
    }
}

?>