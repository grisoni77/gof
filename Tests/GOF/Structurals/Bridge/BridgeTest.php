<?php

namespace Tests\GOF\Structurals\Bridge;

/**
 * Description of BridgeTest
 *
 * @author cris
 */
class BridgeTest extends \Tests\GOF\GOFTestCase
{
    private $auth_provider;
    
    public function setUp()
    {
        $this->auth_provider = new \GOF\Structurals\Bridge\FacebookAuthenticationProvider();
    }
    
    public function testFacebookAuth()
    {
        $user_provider = new \GOF\Structurals\Bridge\UserProvider($this->auth_provider);
        $result = $user_provider->userLogin('cris', 'mypass');
        $this->assertTrue($result, __LINE__);
        $result = $user_provider->userLogin('cris', 'wrongpass');
        $this->assertFalse($result, __LINE__);
    }
    
    public function testUserProvisioning()
    {
        $user_provider = new \GOF\Structurals\Bridge\UserProvider($this->auth_provider);
        $user = $user_provider->getUserByUsername('cris');
        $this->assertTrue($user instanceof \GOF\Structurals\Bridge\User);
        $this->assertEquals(4, $user->getId());
        $this->assertEquals('registered', $user->getRole());
    }
    
    public function testAdminProvider()
    {
        $user_provider = new \GOF\Structurals\Bridge\AdminUserProvider($this->auth_provider);
        $user = $user_provider->getUserByUsername('cris');
        $user_provider->promoteUser($user, 'administrator');
        $this->assertTrue($user instanceof \GOF\Structurals\Bridge\User);
        $this->assertEquals(4, $user->getId());
        $this->assertEquals('administrator', $user->getRole());
    }
    
}

?>