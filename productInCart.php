<?php
class ProductInCart {
    private $name;
    private $price;
    private $cant;

    function __construct($name,$price,$cant = 1)
    {
        $this->name = $name;
        $this->price = $price;
        $this->cant = $cant;
    }

    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name = $name;
    }
    function getPrice(){
        return $this->price;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function getCant(){
        return $this->cant;
    }
    function setCant($canti){
        $this->cant = $canti;
    }

}
?>