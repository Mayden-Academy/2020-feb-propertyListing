<?php

namespace ArmadilloEstates\Entities;


use ArmadilloEstates\Interfaces\IPropertyEntity;

class PropertyEntity implements IPropertyEntity
{
    private $description;
    private $agentRef;
    private $postcode;
    private $beds;
    private $price;
    private $address1;
    private $address2;
    private $town;
    private $typeName;
    private $statusName;
    private $id;
    private $image;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAgentRef(): string
    {
        return $this->agentRef;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function getBeds(): int
    {
        return $this->beds;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

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

    /**
     * @return string Returns Image Url unless Image missing then returns Default Image Url
     */
    public function getImage(): string
    {
        if(empty($this->image)) {
            return "https://i.stack.imgur.com/yZlqh.png";
        } else {
            return "https://dev.maydenacademy.co.uk/resources/property-feed/images/" . $this->image;
        }
    }
}
