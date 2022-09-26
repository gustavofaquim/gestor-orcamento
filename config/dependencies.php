<?php

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \GenericMvc\Infra\EntityManagerCreator())->getEntityManager();
    }
]);
$container = $builder->build();

return $container;