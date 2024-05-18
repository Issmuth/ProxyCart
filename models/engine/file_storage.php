<?php
//file storage module using json serializaion and deserialization
require_once 'models/baseModel.php';
require_once 'models/user.php';
require_once 'models/city.php';
require_once 'models/order.php';
require_once 'models/dispatch.php';
require_once 'models/product.php';
require_once 'models/route.php';

class FileStorage {
    //File Storage class
    private $path = "file.json";
    private $objects = [];  // an associative array of all the created objects

    public function all() {
        // returns all the objects in the storage
        return $this->objects;
    }

    public function new($object) {
        //adds a new object to the objects attribute
        $key = get_class($object) . "." . $object->getId();
        $this->objects[$key] = $object;
    }

    public function save() {
        //saves all the objects in a json file
        $jString = json_encode($this->objects);
        $file = fopen($this->path, 'w');
        if ($file) {
            fwrite($file, $jString);
            fclose($file);
        } else {
            echo "couldn't create/open file";
        }
    }

    public function reload() {
        //reloads all the objects from the json file
        $jString = file_get_contents($this->path);
        $objects = json_decode($jString, true);
        foreach($objects as $key => $value) {
            $class = explode('.', $key)[0];
            $this->objects[$key] = new $class($value);
        }
    }
}
?>