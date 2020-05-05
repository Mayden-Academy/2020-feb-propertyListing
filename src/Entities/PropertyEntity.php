<?php

namespace ArmadilloEstates\Entities;


class PropertyEntity
{
    private $address1;
    private $town;
    private $typeName;
    private $statusName;
    private $id;
    private $image;
    
    public function getAddress1(): string
    {
        return $this->address1;
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
        return $this->image;
    }
}