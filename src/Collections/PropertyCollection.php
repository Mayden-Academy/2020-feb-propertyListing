<?php


namespace ArmadilloEstates\Collections;


use ArmadilloEstates\Entities\PropertyEntity;

class PropertyCollection
{
    private $allProperties;

    public function __construct(array $properties)
    {
        $this->propertyCheck($properties);
        $this->allProperties = $properties;
    }

    private function propertyCheck($properties)
    {
        foreach ($properties as $property) {
            if (!($property instanceof PropertyEntity)) {
                throw new \Exception('Array must only contain instances of PropertyEntity');
            }
        }
    }

    public function getAllProperties(): array
    {
        return $this->allProperties;
    }
}