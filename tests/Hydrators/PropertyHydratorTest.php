<?php

require('vendor/autoload.php');

use ArmadilloEstates\Hydrators\PropertyHydrator;

class PropertyHydratorTest extends PHPUnit\Framework\TestCase
{
    public function testSuccessHydrator()
    {
        $pdoMock = $this->createMock(PDO::class);
        $hydrator = new PropertyHydrator($pdoMock);
        $this->assertObjectHasAttribute('database', $hydrator);
    }
}
