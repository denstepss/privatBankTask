<?php

namespace App\Entity;

use FOS\UserBundle\Model\UserInterface;

class User implements UserInterface
{
    private $id;

    private $email;

    private $usernameCanonical;

    private $roles = [];

    private $password;

    private $plainPassword;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->getEmail();
    }

    public function getUsernameCanonical(): string
    {
        return $this->usernameCanonical;
    }

    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    public function hasRole($role): bool
    {
        $hasRole = \in_array($role, $this->roles, true);

        return $hasRole;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;

        return \array_unique($roles);
    }

    public function addRole($role): void
    {
        $this->roles[] = $role;
    }

    public function removeRole($role): void
    {
        $roleKey = \array_search($role, $this->roles);
        if ($roleKey !== false) {
            unset($this->roles[$roleKey]);
        }
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setUsername($username)
    {
        // TODO: Implement setUsername() method.
    }

    public function setLastLogin(\DateTime $time = null)
    {
        // TODO: Implement setLastLogin() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function setSalt($salt)
    {
        // TODO: Implement setSalt() method.
    }

    public function isSuperAdmin()
    {
        // TODO: Implement isSuperAdmin() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getEmailCanonical()
    {
        // TODO: Implement getEmailCanonical() method.
    }

    public function setEmailCanonical($emailCanonical)
    {
        // TODO: Implement setEmailCanonical() method.
    }

    public function setEnabled($boolean)
    {
        // TODO: Implement setEnabled() method.
    }

    public function setSuperAdmin($boolean)
    {
        // TODO: Implement setSuperAdmin() method.
    }

    public function getConfirmationToken()
    {
        // TODO: Implement getConfirmationToken() method.
    }

    public function setConfirmationToken($confirmationToken)
    {
        // TODO: Implement setConfirmationToken() method.
    }

    public function setPasswordRequestedAt(\DateTime $date = null)
    {
        // TODO: Implement setPasswordRequestedAt() method.
    }

    public function setRoles(array $roles)
    {
        // TODO: Implement setRoles() method.
    }

    public function isPasswordRequestNonExpired($ttl)
    {
        // TODO: Implement isPasswordRequestNonExpired() method.
    }

    public function isEnabled()
    {
        // TODO: Implement isEnabled() method.
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }
}
