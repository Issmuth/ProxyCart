<?php
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/engine/db_storage.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/route.php';
require_once __DIR__ . '/../models/city.php';

$storage = new DBStorage();
$start = strtotime('now');
$end = strtotime('+1 year');
$cities = $storage->all('City');
$users = $storage->all('User');

// ?for ($i = 0; $i < 2; $i++) {
// }?

$data = [];
$data['leaving_date'] = date('Y-m-d', rand($start, $end));
$data['returning_date'] = date('Y-m-d', rand($start, $end));
$data['origin'] = $cities[array_rand($cities)]->getId();
$data['destination'] = $cities[array_rand($cities)]->getId();
$data['proxy'] =  $users[array_rand($users)]->getId();
$data['is_round'] = false;
$route = new Route($data);
$storage->new($route);

$storage->save();
foreach ($storage->all('Route') as $key => $value) {
    echo $value . PHP_EOL;
}
?>