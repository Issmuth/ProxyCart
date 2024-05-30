<?php
require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../models/baseModel.php';
require_once __DIR__ . '/../../models/city.php';
require_once __DIR__ . '/../../models/engine/db_storage.php';
use Doctrine\ORM\Tools\SchemaTool;

function dump_cities() {
    $db = new DBStorage();

    $jsonCities = file_get_contents('countries.json');
    $countries = json_decode($jsonCities, true);
    foreach ($countries as $country => $cities) {
        foreach ($cities as $city) {
            $city_obj = new City(['name' => $city, 'country' => $country]);
            $db->new($city_obj);
        }
    }
    $db->save();
}
dump_cities();
?>