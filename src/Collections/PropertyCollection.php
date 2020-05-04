<?php


namespace ArmadilloEstates\Collections;


class PropertyCollection
{
    private $allProperties;

    public function __construct(array $properties)
    {
        $this->allProperties = $properties;
    }

    public function getAllProperties(): array
    {
        return $this->allProperties;
    }
}