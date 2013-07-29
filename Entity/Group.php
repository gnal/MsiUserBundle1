<?php

namespace Msi\UserBundle\Entity;

use FOS\UserBundle\Entity\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct($name = '', $roles = array())
    {
        $this->name = $name;
        $this->roles = $roles;
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
