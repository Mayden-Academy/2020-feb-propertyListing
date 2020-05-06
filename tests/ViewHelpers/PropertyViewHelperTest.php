<?php

require('vendor/autoload.php');

use ArmadilloEstates\ViewHelpers\PropertyViewHelper;

class PropertyViewHelperTest extends PHPUnit\Framework\TestCase
{
    public function testSuccessDisplayAll()
    {
        $entity = $this->createMock(\ArmadilloEstates\Entities\PropertyEntity::class);
        $entity->expects($this->once())
            ->method('getAddress1')
            ->willReturn('Address1');

        $entity->expects($this->once())
            ->method('getAddress2')
            ->willReturn('Address2');

        $entity->expects($this->once())
            ->method('getTown')
            ->willReturn('Town');

        $entity->expects($this->once())
            ->method('getTypeName')
            ->willReturn('Sale');

        $entity->expects($this->once())
            ->method('getStatusName')
            ->willReturn('Sold');

        $entity->expects($this->once())
            ->method('getImage')
            ->willReturn('Image');

        $collection = $this->createMock(\ArmadilloEstates\Collections\PropertyCollection::class);
        $collection->expects($this->once())
            ->method('getAllProperties')
            ->willReturn([$entity]);

        $expected = '<div class="col-4 text-center mb-4"><div class="card">';
        $expected .= '<h5 class="card-title pt-3">Address1 Address2<br>Town</h5>';
        $expected .= '<img class="card-img-top cardImg" src=Image alt="Card image cap"><div class="card-body">';
        $expected .= '<p class="card-text">Sale</p><p class="card-text">Sold</p>';
        $expected .= '<a href="#" class="btn btn-primary">View More...</a></div></div></div>';

        $this->assertEquals($expected, PropertyViewHelper::displayAll($collection));
    }

    public function testIncorrectEntityPassedDisplayAll()
    {
        $stdClass = $this->createMock(stdClass::class);

        $this->expectException(TypeError::class);

        PropertyViewHelper::displayAll($stdClass);
    }

    public function testEmptyCollectionDisplayAll()
    {
        $collection = $this->createMock(\ArmadilloEstates\Collections\PropertyCollection::class);
        $collection->expects($this->once())
            ->method('getAllProperties')
            ->willReturn([]);


        $this->assertEquals('', PropertyViewHelper::displayAll($collection));
    }
}
