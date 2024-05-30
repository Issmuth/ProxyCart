<?php
require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../city.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


class DBStorage {
    public $classes = [
        "Route" => Route::class,
        "User" => User::class,
        "Dispatch" => Dispatch::class,
        "City" => City::class,
        "Product" => Product::class,
        "Order" => Order::class
    ];
    public $entityManager;
    public $config;
    public $connection;
    function __construct()
    {
        $this->config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__ . '/../'));
        $params = [
            'dbname' => 'proxy_cart',
            'user' => 'pc_admin',
            'password' => 'pcadminpass',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ];
        $this->connection = DriverManager::getConnection($params, $this->config);
        $this->entityManager = new EntityManager($this->connection, $this->config);
    }

    public function all($class = null) {
        $objs = [];
        if ($class != null && isset($this->classes[$class])) {
            $objects = $this->entityManager->getRepository($this->classes[$class])->findAll();
            foreach ($objects as $object) {
                $key = $class . '.' . $object->getId();
                $objs[$key] = $object;                   
            }
        }
        return $objs;
    }

    public function new($object) {
        if ($object != null) {
            $this->entityManager->persist($object);
        }
    }

    public function save() {
        $this->entityManager->flush();
    }

    public function delete($object) {
        if ($object != null) {
            $this->entityManager->remove($object);
        }
    }

    public function get($id, $class) {
        if (!$class || !$id || !isset($this->classes[$class])) {
            return null;
        }
        return $this->entityManager->getRepository($this->classes[$class])->find($id);
    }

    public function count($class) {
        if (!$class || !isset($this->classes[$class])) {
            return 0;
        }
        return $this->entityManager->getRepository($this->classes[$class])->count([]);
    }
}
?>