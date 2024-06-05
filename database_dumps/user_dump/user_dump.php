<?php
require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../models/engine/db_storage.php';
require_once __DIR__ . '/../../models/user.php';

$faker = Faker\Factory::create();
$storage = new DBStorage();

for ($i = 0; $i < 1000; $i++) {
    $data = [];
    $data['firstName'] =  $faker->firstname();
    $data['lastName'] = $faker->lastname();
    $data['email'] = $faker->email();
    $data['password'] = $faker->password();
    $newUser = new User($data);
    $storage->new($newUser);
}

$storage->save();
?>