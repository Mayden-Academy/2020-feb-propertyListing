<?php

require('vendor/autoload.php');

use ArmadilloEstates\Collections\PropertyCollection;

class PropertyCollectionTest extends PHPUnit\Framework\TestCase
{
    public function testSuccessPropertyCollection()
    {
        $entity = $this->createMock(\ArmadilloEstates\Entities\PropertyEntity::class);
        $array = [$entity, $entity, $entity];
        $collection = new PropertyCollection($array);
        $this->addToAssertionCount(1);
    }

    public function testFailurePropertyCollection()
    {
        $entity = $this->createMock(\ArmadilloEstates\Entities\PropertyEntity::class);
        $array = [$entity, $entity, $entity, 'Fail'];
        $this->expectExceptionMessage('Array must only contain instances of PropertyEntity');
        $collection = new PropertyCollection($array);
    }
}
