<?php

namespace ArmadilloEstates\Entities;


class PropertyEntity
{
    private $Address1;
    private $Town;
    private $Type;
    private $Status;
    private $id;
    private $Image;
    
    public function getAddress1(): string
    {
        return $this->Address1;
    }
    
    public function getTown(): string
    {
        return $this->Town;
    }

    public function getType(): string
    {
        return $this->Type;
    }
    
    public function getStatus(): string
    {
        return $this->Status;
    }

    public function getId(): int 
    {
        return $this->id;
    }
    
    public function getImage(): string
    {
        return $this->Image;
    }
}