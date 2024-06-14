<?php
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/route.php';
require_once __DIR__ . '/../models/city.php';
require_once __DIR__ . '/../models/engine/db_storage.php';

$storage = new DBStorage();
$start = strtotime('now');
$end = strtotime('+1 year');
$cities = $storage->all('City');
$users = $storage->all('User');

$data = [];
for ($i = 0; $i < 10; $i++) {
    $data['leaving_date'] = date('Y-m-d', rand($start, $end));
    $data['return_date'] = date('Y-m-d', rand($start, $end));
    $data['origin'] = $cities[array_rand($cities)];
    $data['destination'] = $cities[array_rand($cities)];
    $data['proxy'] =  $users[array_rand($users)];
    $data['is_round'] = true;
    $route = new Route($data);
    $storage->new($route);
}

$storage->save();

?>