<?php

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \GestorOrcamento\Infra\EntityManagerCreator())->getEntityManager();
    }
]);
$container = $builder->build();

return $container;