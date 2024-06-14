<?php
require_once __DIR__ . "/vendor/autoload.php";

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Configuration;

$conf = new Configuration();
$conf->setProxyDir(__DIR__ . '/proxy');
$conf->setProxyNamespace('Proxy');
$conf->setAutoGenerateProxyClasses(true);

$config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__ . '/models/'));

$params = [
    'dbname' => 'proxy_cart',
    'user' => 'pc_admin',
    'password' => 'pcadminpass',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];

$connection = DriverManager::getConnection($params, $config);
$entityManager = new EntityManager($connection, $config);

$schema = new SchemaTool($entityManager);
$classes = $entityManager->getMetadataFactory()->getAllMetadata();
$schema->createSchema($classes, true);
echo "Schema created sucessfully" . PHP_EOL;
?>