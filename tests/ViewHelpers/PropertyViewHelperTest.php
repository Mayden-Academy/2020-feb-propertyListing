<?php

require('vendor/autoload.php');

use ArmadilloEstates\ViewHelpers\PropertyViewHelper;
use ArmadilloEstates\Entities\PropertyEntity;
use ArmadilloEstates\Collections\PropertyCollection;

class PropertyViewHelperTest extends PHPUnit\Framework\TestCase
{
    public function testSuccessDisplayOne() {
        $entity = $this->createMock(PropertyEntity::class);

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
            ->method('getPostcode')
            ->willReturn('Postcode');

        $entity->expects($this->once())
            ->method('getAgentRef')
            ->willReturn('AgentRef');

        $entity->expects($this->once())
            ->method('getImage')
            ->willReturn('Image');

        $entity->expects($this->once())
            ->method('getPrice')
            ->willReturn(5);

        $entity->expects($this->once())
            ->method('getTypeName')
            ->willReturn('TypeName');

        $entity->expects($this->once())
            ->method('getBeds')
            ->willReturn(5);

        $entity->expects($this->once())
            ->method('getStatusName')
            ->willReturn('StatusName');

        $entity->expects($this->once())
            ->method('getDescription')
            ->willReturn('Description');

        $returnString = PropertyViewHelper::displayOne($entity);
        $expectedString = '<div class="col-12 mb-4">';
        $expectedString .= '<div class="card">';
        $expectedString .= '<img class="card-img-top" src=Image alt="Card image cap">';
        $expectedString .= '<div class="detailsContainer d-flex">';
        $expectedString .= '<div class="col-4 card-body">';
        $expectedString .= '<h5>Address</h5>';
        $expectedString .= '<h5>Address1</h5>';
        $expectedString .= '<h5>Address2</h5>';
        $expectedString .= '<h5>Town</h5>';
        $expectedString .= '<h5>Postcode</h5>';
        $expectedString .= '</div>';
        $expectedString .= '<div class="col-8 card-body row d-flex">';
        $expectedString .= '<h5 class="col-12 agentReference">Agent Reference: AgentRef</h5>';
        $expectedString .= '<div class="col-12 invisible">niru</div>';
        $expectedString .= '<h5 class="col-6 price">Price: £5</h5>';
        $expectedString .= '<h5 class="col-6 type">Type: TypeName</h5>';
        $expectedString .= '<div class="col-12 invisible">hi</div>';
        $expectedString .= '<h5 class="col-6 bedrooms">Bedrooms: 5</h5>';
        $expectedString .= '<h5 class="col-6 status">Status: StatusName<h5>';
        $expectedString .= '</div></div><div class="dropdown-divider"></div>';
        $expectedString .= '<div><h5 class="col-12 descriptionTitle">Property Details:</h5>';
        $expectedString .= '<div class="col-12 description">Description</div>';
        $expectedString .= '</div></div></div>';

        $this->assertSame($expectedString, $returnString);
    }

    public function testFailDisplayOneWrongClass() {
        $entity = $this->createMock(stdClass::class);

        $this->expectException(TypeError::class);

        $returnString = PropertyViewHelper::displayOne($entity);
    }

    public function testSuccessDisplayAll()
    {
        $entity = $this->createMock(PropertyEntity::class);

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

        $entity->expects($this->once())
            ->method('getId')
            ->willReturn(1);

        $collection = $this->createMock(PropertyCollection::class);
        $collection->expects($this->once())
            ->method('getAllProperties')
            ->willReturn([$entity]);

        $expected = '<div class="col-4 text-center mb-4"><div class="card">';
        $expected .= '<h5 class="card-title pt-3">Address1 Address2<br>Town</h5>';
        $expected .= '<img class="card-img-top cardImg" src=Image alt="Card image cap"><div class="card-body">';
        $expected .= '<p class="card-text">Sale</p><p class="card-text">Sold</p>';
        $expected .= '<a href="property.php?id=1" class="btn btn-primary">View more...</a>';
        $expected .= '</div></div></div>';

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
        $collection = $this->createMock(PropertyCollection::class);

        $collection->expects($this->once())
            ->method('getAllProperties')
            ->willReturn([]);

        $this->assertEquals('', PropertyViewHelper::displayAll($collection));
    }
}