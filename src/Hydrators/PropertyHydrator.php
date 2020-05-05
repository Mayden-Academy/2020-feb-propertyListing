<?php


namespace ArmadilloEstates\Hydrators;


use ArmadilloEstates\Collections\PropertyCollection;
use ArmadilloEstates\Entities\PropertyEntity;
use ArmadilloEstates\Interfaces\IPropertyCollection;
use ArmadilloEstates\Interfaces\IPropertyEntity;

class PropertyHydrator
{
    private $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getAllBasicProperties(): IPropertyCollection
    {
        $query = $this->database->query("
SELECT `address1`, `address2`, `town`, `typeName`, `statusName`, `properties`.`id`,  `image` FROM `properties` 
JOIN `types` ON `properties`.`propertyType` = `types`.`typeId` 
JOIN `status` ON `properties`.`status` = `status`.`statusId`;
");

        $result = $query->setFetchMode(\PDO::FETCH_CLASS, PropertyEntity::class);

        return new PropertyCollection($query->fetchAll());
    }

    public function getCompleteListingById(string $id): IPropertyEntity {
        $query = $this->database->prepare("
        SELECT `description`, `agentRef`, `postcode`, `price`, `beds`, `address1`, `address2`, `town`, `typeName`, `statusName`, `properties`.`id`,  `image` FROM `properties` 
JOIN `types` ON `properties`.`propertyType` = `types`.`typeId` 
JOIN `status` ON `properties`.`status` = `status`.`statusId` WHERE `properties`.`id`=?;
        ");
        $query->execute([$id]);
        $result = $query->setFetchMode(\PDO::FETCH_CLASS, PropertyEntity::class);

        return $query->fetch();
    }
}
