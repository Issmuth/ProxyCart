<?php
require 'models/baseModel.php';
require 'models/city.php';
require 'models/user.php';
require 'models/engine/file_storage.php';

$storage = new FileStorage();
 // $base = new BaseModel();
//  $data1 = [
//      "name" => "Addis Ababa",
//      "country" => "Ethiopia"
//     ];
    
// $data2 = [
        // "firstName" => "Ismael",
        // "lastName" => "Muzemil",
        // "email" => "ismael.mdev@gmail.com",
        // "password" => "ismavatar212"
// ];
    
// $city = new City($data1);
//  $user = new User($data2);
// echo $base . "\n";
// echo $city . "\n";
// echo $user. $user->firstName;

// $storage->new($base);
// $storage->new($city);
// $storage->new($user);
$storage->reload();
$objects = $storage->all();

echo "from objects: \n";

foreach($objects as $key => $value) {
    // if ($key)
    echo $key . ": " . $value . "\n";
}

// $storage->save();
?>