<?php

namespace ArmadilloEstates\Entities;


use ArmadilloEstates\Interfaces\IPropertyEntity;

class PropertyEntity implements IPropertyEntity
{
    private $address1;
    private $address2;
    private $town;
    private $typeName;
    private $statusName;
    private $id;
    private $image;
    
    public function getAddress1(): string
    {
        return $this->address1;
    }

    public function getAddress2(): string
    {
        return $this->address2;
    }
    
    public function getTown(): string
    {
        return $this->town;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }
    
    public function getStatusName(): string
    {
        return $this->statusName;
    }

    public function getId(): int 
    {
        return $this->id;
    }
    
    public function getImage(): string
    {
        if(empty($this->image)) {
            return "https://i.stack.imgur.com/yZlqh.png";
        } else {
            return "https://dev.maydenacademy.co.uk/resources/property-feed/images/" . $this->image;
        }
    }
}