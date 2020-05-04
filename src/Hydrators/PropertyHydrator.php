<?php


namespace ArmadilloEstates\Hydrators;


use ArmadilloEstates\Entities\PropertyEntity;

class PropertyHydrator
{
    private $database;

   public function __construct(\PDO $database)
   {
       $this->database = $database;
   }

   public function getAllBasicProperties()
   {
       $query = $this->database->query("SELECT `Address1`, `Town`, `Type`, `Status`, `id`,  `Image` FROM `properties`;");
       $result = $query->setFetchMode(\PDO::FETCH_CLASS, PropertyEntity::class);
       return $query->fetchAll();
   }
}