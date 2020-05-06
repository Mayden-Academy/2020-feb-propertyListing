<?php

require('vendor/autoload.php');

use ArmadilloEstates\Collections\PropertyCollection;
use ArmadilloEstates\Interfaces\IPropertyCollection;
use ArmadilloEstates\Interfaces\IPropertyEntity;

class PropertyCollectionTest extends PHPUnit\Framework\TestCase
{
    public function testSuccessPropertyCollection()
    {
        $entity = $this->createMock(\ArmadilloEstates\Entities\PropertyEntity::class);
        $array = [$entity, $entity, $entity];
        $collection = new PropertyCollection($array);
        $this->assertInstanceOf(PropertyCollection::class, $collection);
    }

    public function testFailurePropertyCollection()
    {
        $entity = $this->createMock(\ArmadilloEstates\Entities\PropertyEntity::class);
        $array = [$entity, $entity, $entity, 'Fail'];
        $this->expectExceptionMessage('Array must only contain Objects that implement the IPropertyEntity interface');
        $collection = new PropertyCollection($array);
    }

    public function testSuccessGetAllProperties()
    {
        $entity = $this->createMock(\ArmadilloEstates\Entities\PropertyEntity::class);
        $array = [$entity, $entity, $entity];
        $collection = new PropertyCollection($array);

        $expected = $collection->getAllProperties();
        $this->assertEquals($expected, $array);
    }
}
