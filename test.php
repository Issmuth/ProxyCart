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

$storage = new DBStorage();

$routes = $storage->all('Route');

$proxies =  $routes['Route.12a4236d-29bb-4106-bd8c-cb2bd8b59d58']->proxy;

foreach($proxies as $proxy) {
    echo $proxy->getId();
}
// foreach($routes as $key => $value) {
//     echo $value;
// }
// $cities = $storage->all('City');
// $users = $storage->all('User');

// $start = strtotime('now');
// $end = strtotime('+1 year');
// $city_data = [
//     "is_round" => true,
//     "leaving_date" => date('Y-m-d', rand($start, $end)),
//     "return_date" => date('Y-m-d', rand($start, $end)),
//     "destination" => $cities[array_rand($cities)],
//     "origin" => $cities[array_rand($cities)],
//     "proxy" => $users[array_rand($users)]
// ];

// $route = new Route($city_data);
// echo $route->getId();
// $storage->new($route);

// $storage->save();


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