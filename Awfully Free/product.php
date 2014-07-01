<?php

class Product {
    public $ID;
    public $name;
    public $price_without_taxes;
    public $image;

    public function __construct($name, $price, $image) {
        $this->name = $name;
        $this->price_without_taxes = $price;
        $this->image = $image;
    }

    public static function withID($id, $name, $price, $image) {
        $product = new Product($name, $price, $image);
        $product->ID = $id;
        return $product;
    }

    public function calculateTax($price) {
        $price *= 1.06;
        return $price;
    }
}

?>