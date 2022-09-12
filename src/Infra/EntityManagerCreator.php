<?php

namespace GestorOrcamento\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = true;

        /*$dbParams = [
            'url' => "mysql://gustavofaquim:123456789@servidor/gestor-orcamento"
        ];*/

       /* $dbParams = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite'
        ); */

        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'gustavofaquim',
            'password' => '123456789',
            'dbname' => 'gestor-orcamento',
        );

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
