<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Proxy\ProxyFactory;
use Doctrine\DBAL\DriverManager;

// Require Composer's autoloader
require_once 'vendor/autoload.php';
// Doctrine configuration
$isDevMode = false;
$dbParams = [
    'dbname' => 'proxy_cart',
    'user' => 'pc_admin',
    'password' => 'pcadminpass',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];

$proxyDir = __DIR__ . '/tmp';
$metadataConfig = ORMSetup::createAttributeMetadataConfiguration(array(__DIR__ . '/../'), $isDevMode, $proxyDir);
$connection = DriverManager::getConnection($dbParams, $metadataConfig);
$entityManager = new EntityManager($connection, $metadataConfig);

// Get the ProxyFactory
$proxyFactory = $entityManager->getProxyFactory();

// Regenerate proxies
$proxyFactory->generateProxyClasses($entityManager->getMetadataFactory()->getAllMetadata());
echo "Proxies regenerated successfully.\n";
