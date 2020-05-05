<?php


namespace ArmadilloEstates\ViewHelpers;


use ArmadilloEstates\Interfaces\IPropertyCollection;

abstract class PropertyViewHelper
{
    public static function displayAll(IPropertyCollection $propertyCollection): string
    {
        $stringToDisplay = "";
        foreach ($propertyCollection->getAllProperties() as $property) {
            $stringToDisplay .= '<div class="col-4 text-center mb-4"><div class="card">';
            $stringToDisplay .= '<h5 class="card-title pt-3">' . $property->getAddress1() . ' ' . $property->getAddress2() . ', ' . $property->getTown() . '</h5>';
            $stringToDisplay .= '<img class="card-img-top cardImg" src="https://dev.maydenacademy.co.uk/resources/property-feed/images/' . $property->getImage() . '" alt="Card image cap">';
            $stringToDisplay .= '<div class="card-body">';
            $stringToDisplay .= '<p class="card-text">' . $property->getTypeName() . '</p>';
            $stringToDisplay .= '<p class="card-text">' . $property->getStatusName() . '</p>';
            $stringToDisplay .= '<a href="#" class="btn btn-primary">View more...</a>';
            $stringToDisplay .= '</div></div></div>';
        }

        return $stringToDisplay;
    }
}