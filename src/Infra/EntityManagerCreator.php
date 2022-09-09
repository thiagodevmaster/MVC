<?php

namespace Alura\Cursos\Infra;

use Doctrine\ORM\{
    EntityManager,
    EntityManagerInterface,
    ORMSetup
};

class EntityManagerCreator
{
    public static function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite'
        );

        $config = ORMSetup::createAttributeMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
