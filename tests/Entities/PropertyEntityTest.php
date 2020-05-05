<?php

require('vendor/autoload.php');

use ArmadilloEstates\Entities\PropertyEntity;

class PropertyEntityTest extends PHPUnit\Framework\TestCase
{
    public function testSuccessPropertyEntity()
    {
        $entity = new PropertyEntity();
        $this->assertInstanceOf(PropertyEntity::class, $entity);
    }
}
