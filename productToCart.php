<?php 

Class ProductToCart {

    private $id;
    private $cant;

    function __construct($id,$cant=1)
    {
        $this->id = $id;
        $this->cant = $cant;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getCant() {
        return $this->cant;
    }

    function setCant($cant) {
        $this->cant = $cant;
    }
}
?>