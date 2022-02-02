<?php

use Application\Helpers\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require "vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
