<?php


namespace ArmadilloEstates\Collections;


use ArmadilloEstates\Entities\PropertyEntity;

class PropertyCollection
{
    private $allProperties;

    public function __construct(array $properties)
    {
        foreach ($properties as $property) {
            if (!($property instanceof PropertyEntity)) {
                throw new \Exception('Array must only contain instances of PropertyEntity');
            }
        }

        $this->allProperties = $properties;
    }

    public function getAllProperties(): array
    {
        return $this->allProperties;
    }
}