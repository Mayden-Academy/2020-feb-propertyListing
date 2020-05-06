<?php


namespace ArmadilloEstates\ViewHelpers;


use ArmadilloEstates\Interfaces\IPropertyCollection;
use ArmadilloEstates\Interfaces\IPropertyEntity;

abstract class PropertyViewHelper
{
    public static function displayAll(IPropertyCollection $propertyCollection): string
    {
        $stringToDisplay = "";
        foreach ($propertyCollection->getAllProperties() as $property) {
            $stringToDisplay .= '<div class="col-4 text-center mb-4"><div class="card">';
            $stringToDisplay .= '<h5 class="card-title pt-3">' . $property->getAddress1() . ' ' . $property->getAddress2() . '<br>' . $property->getTown() . '</h5>';
            $stringToDisplay .= '<img class="card-img-top cardImg" src=' . $property->getImage() . ' alt="Card image cap">';
            $stringToDisplay .= '<div class="card-body">';
            $stringToDisplay .= '<p class="card-text">' . $property->getTypeName() . '</p>';
            $stringToDisplay .= '<p class="card-text">' . $property->getStatusName() . '</p>';
            $stringToDisplay .= '<a href="property.php?id=' . $property->getId() . '" class="btn btn-primary">View more...</a>';
            $stringToDisplay .= '</div></div></div>';
        }

        return $stringToDisplay;
    }

    public static function displayOne(IPropertyEntity $property): string {
        $stringToDisplay = '<div class="col-12 mb-4">';
        $stringToDisplay .= '<div class="card">';
        $stringToDisplay .= '<img class="card-img-top" src=' . $property->getImage() . ' alt="Card image cap">';
        $stringToDisplay .= '<div class="detailsContainer d-flex">';
        $stringToDisplay .= '<div class="col-4 card-body">';
        $stringToDisplay .= '<h5>Address</h5>';
        $stringToDisplay .= '<h5>' . $property->getAddress1() . '</h5>';
        $stringToDisplay .= '<h5>' . $property->getAddress2() . '</h5>';
        $stringToDisplay .= '<h5>' . $property->getTown() . '</h5>';
        $stringToDisplay .= '<h5>' . $property->getPostcode(). '</h5>';
        $stringToDisplay .= '</div>';
        $stringToDisplay .= '<div class="col-8 card-body row d-flex">';
        $stringToDisplay .= '<h5 class="col-12 agentReference">Agent Reference: ' . $property->getAgentRef() . '</h5>';
        $stringToDisplay .= '<div class="col-12 invisible">niru</div>';
        $stringToDisplay .= '<h5 class="col-6 price">Price: £' . $property->getPrice() . '</h5>';
        $stringToDisplay .= '<h5 class="col-6 type">Type: ' . $property->getTypeName() . '</h5>';
        $stringToDisplay .= '<div class="col-12 invisible">hi</div>';
        $stringToDisplay .= '<h5 class="col-6 bedrooms">Bedrooms: ' . $property->getBeds() . '</h5>';
        $stringToDisplay .= '<h5 class="col-6 status">Status: ' . $property->getStatusName() . '<h5>';
        $stringToDisplay .= '</div></div><div class="dropdown-divider"></div>';
        $stringToDisplay .= '<div><h5 class="col-12 descriptionTitle">Property Details:</h5>';
        $stringToDisplay .= '<div class="col-12 description">' . $property->getDescription() . '</div>';
        $stringToDisplay .= '</div></div></div>';

        return $stringToDisplay;
    }
}
