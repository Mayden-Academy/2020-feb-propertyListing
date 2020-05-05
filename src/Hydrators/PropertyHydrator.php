<?php


namespace ArmadilloEstates\Hydrators;


use ArmadilloEstates\Collections\PropertyCollection;
use ArmadilloEstates\Entities\PropertyEntity;
use ArmadilloEstates\Interfaces\IPropertyCollection;

class PropertyHydrator
{
    private $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getAllBasicProperties(): IPropertyCollection
    {
        $query = $this->database->query("SELECT `Address1`, `Town`, `propertyType`, `Status`, `id`,  `Image` FROM `properties`;");
        $result = $query->setFetchMode(\PDO::FETCH_CLASS, PropertyEntity::class);

        return new PropertyCollection($query->fetchAll());
    }
}