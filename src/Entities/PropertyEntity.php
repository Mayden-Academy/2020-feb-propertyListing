<?php

namespace ArmadilloEstates\Entities;


class PropertyEntity
{
    private $address1;
    private $town;
    private $type;
    private $status;
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

    public function getType(): string
    {
        return $this->type;
    }
    
    public function getStatus(): string
    {
        return $this->status;
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