<?php

namespace GOF\Structurals\Bridge;

/**
 * Refined Bridge abstraction
 *
 * @author cris
 */
class AdminUserProvider extends UserProvider
{
    public function promoteUser(&$user, $role) {
        $user->setRole($role);
    }
}

?>