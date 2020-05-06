<?php


namespace ArmadilloEstates\Collections;


use ArmadilloEstates\Interfaces\IPropertyCollection;
use ArmadilloEstates\Interfaces\IPropertyEntity;

class PropertyCollection implements IPropertyCollection
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
            if (!($property instanceof IPropertyEntity)) {
                throw new \Exception('Array must only contain instances of PropertyEntity');
            }
        }
    }

    public function getAllProperties(): array
    {
        return $this->allProperties;
    }
}