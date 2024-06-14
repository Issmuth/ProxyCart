<?php
require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;




$config = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__ . '/models'), true,  __DIR__ . '/proxy', null, false);
$config->setProxyNamespace('Proxy');
$config->setAutoGenerateProxyClasses(true);

$params = [
    'dbname' => 'proxy_cart',
    'user' => 'pc_admin',
    'password' => 'pcadminpass',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];

$connection = DriverManager::getConnection($params, $config);
$entityManager = new EntityManager($connection, $config);

$proxyFactory = $entityManager->getProxyFactory();
$proxyFactory->generateProxyClasses($entityManager->getMetadataFactory()->getAllMetadata());

$schemaTool = new SchemaTool($entityManager);
$classes = $entityManager->getMetadataFactory()->getAllMetadata();
$schemaTool->updateSchema($classes, true);

echo "Schema generated successfully" . PHP_EOL;
?>