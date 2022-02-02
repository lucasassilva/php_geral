<?php

namespace Application\Helpers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Migrations\Configuration\Migration\PhpFile;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $config = new PhpFile("migrations.php");

        $connection = [
            "driver" => "pdo_mysql",
            "user" => "root",
            "password" => "Rlxrvt1241x@",
            "dbname" => "db_doctrine",
            "port" => "3306"
        ];

        $ORMconfig = Setup::createAnnotationMetadataConfiguration(["./src/app/Models"], true, null, null, false);
        $entityManager = EntityManager::create($connection, $ORMconfig);
        DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
        return $entityManager;
    }
}
