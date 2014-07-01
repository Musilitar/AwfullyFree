<?php
include_once 'product.php';
include_once 'databaseSingleton.php';

class ProductDatabase {

    private static function getConnection() {
        return DatabaseSingleton::getDatabase();
    }

    public static function getById($id) {
        $resultaat = self::getConnection()->voerSqlQueryUit("SELECT * FROM products WHERE ID=?", array($id));
        if ($resultaat->num_rows == 1) {
            $databaseRij = $resultaat->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function getAll() {
        $resultaat = self::getConnection()->voerSqlQueryUit("SELECT * FROM products");
        $resultatenArray = array();
        for ($index = 0; $index < $resultaat->num_rows; $index++) {
            $databaseRij = $resultaat->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultatenArray[$index] = $nieuw;
        }
        return $resultatenArray;
    }

    public static function insert($product) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO products(name, price_without_taxes, image) VALUES ('?', '?', '?')", array($product->name, $product->price_without_taxes, $product->image));
    }

    public static function deleteById($id) {
        return self::getConnection()->voerSqlQueryUit("DELETE FROM products where ID=?", array($id));
    }

    public static function delete($product) {
        return self::deleteById($product->ID);
    }

    public static function update($product) {
        return self::getConnection()->voerSqlQueryUit("UPDATE products SET name='?', price_without_taxes='?', image='?' WHERE ID=?", array($product->name, $product->price_without_taxes, $product->image, $product->ID));
    }

    protected static function converteerRijNaarObject($databaseRij) {
        return Product::withID($databaseRij['ID'], $databaseRij['name'], $databaseRij['price_without_taxes'], $databaseRij['image']);
    }

}
