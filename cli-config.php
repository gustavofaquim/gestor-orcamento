<?php

use GenericMvc\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new \GenericMvc\Infra\EntitymanagerCreator())->getEntityManager()
);
