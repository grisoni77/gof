<?php

namespace GOF\Structurals\Bridge;

/**
 * Description of User
 *
 * @author cris
 */
class User 
{
    private $id;
    private $name;
    private $role;
    
    public function __construct($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->role = 'registered';
    }
    
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function setRole($role) { $this->role = $role; }
    public function getRole() { return $this->role; }
}

?>