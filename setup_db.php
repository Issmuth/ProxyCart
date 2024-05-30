<?php

$schema = new SchemaTool($db->entityManager);
$classes = $db->entityManager->getMetadataFactory()->getAllMetadata();

$schema->createSchema($classes, true);
?>