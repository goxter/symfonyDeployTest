<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HypervisorRepository")
 */
class Hypervisor {
    //put your code here
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    
    /**
     * @ORM\Column(type="string", length=250)
     */
    private $description; 
    
    /**
     * @ORM\Column(type="integer")
     */
    private $isdefault;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $isshared;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $type;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $identifier;
    
    /**
     * @ORM\Column(type="string", length=250)
     */
    private $pool;
    
    public function setValues($name, $description, $isdefault, $isshared, $type, $identifier, $pool)
    {
        $this->name = $name;
        $this->description = $description;
        $this->isdefault = $isdefault;
        $this->isshared = $isshared;
        $this->type = $type;
        $this->identifier = $identifier;
        $this->pool = $pool;
    }
}
