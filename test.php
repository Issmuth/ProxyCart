<?php
require 'models/baseModel.php';
require 'models/city.php';
require 'models/user.php';
require 'models/dispatch.php';
require 'models/route.php';
require 'models/order.php';
require 'models/product.php';
require 'models/engine/file_storage.php';
require 'models/engine/db_storage.php';


$city_data = [
    "firstName" => "Aymen",
    "lastName" => "Mahir",
    "email" => 'imerz11@gmail.com',
    "password" => '123abc'
];

$user = new User($city_data);

echo $user->password;

// $city = new City($city_data);
// $storage->entityManager->persist($city);
// $storage->entityManager->flush();


// $user = new User($user_data);
// $storage->new($user);
// $storage->save();

// $city_objects = $storage->all('City');

// foreach ($city_objects as $key => $value) {
    // echo $value;
// }

// $storage->delete($city_objects['City.fc3de6ce-db15-4f46-8c40-5b3590d2907d']);

// echo "--------------------------------------";

// foreach ($storage->all('City') as $key => $value) {
    // echo $value;
// }

// $storage->save();
?>