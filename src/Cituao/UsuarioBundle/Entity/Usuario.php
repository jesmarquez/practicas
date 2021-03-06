<?php

namespace Cituao\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cituao\UsuarioBundle\Entity\Usuario
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity(repositoryClass="Cituao\UsuarioBundle\Entity\UsuarioRepository")
 */
class Usuario implements AdvancedUserInterface, \Serializable
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

     /**
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     * @JoinTable(name=usuario_role
     */
    private $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
		$this->is_active = true;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuario
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

/**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->salt,
            $this->password,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->salt,
            $this->password,
        ) = unserialize($serialized);
    }

	/**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @inheritDoc
     */


    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * @inheritDoc
     */

    public function isAccountNonLocked()
    {
        return true;
    }
    /**
     * @inheritDoc
     */

    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * @inheritDoc
     */

    public function isEnabled()
    {
        return $this->is_active;
    }

    /**
     * Add roles
     *
     * @param \Cituao\UsuarioBundle\Entity\Role $roles
     * @return Usuario
     */
    public function addRole(\Cituao\UsuarioBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Cituao\UsuarioBundle\Entity\Role $roles
     */
    public function removeRole(\Cituao\UsuarioBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }
}