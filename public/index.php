<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ . '/../src/Controller/ListarCursos.php';


use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

//$caminho = $_SERVER['PATH_INFO'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

//$_SESSION['logado'] = True;


$rotaLogin = str_contains($caminho, 'login');
$rotaCadastro = str_contains($caminho, 'usuario');

if(!isset($_SESSION['logado']) && $rotaLogin === False && $rotaCadastro === False){
    
    header('Location: /login');
    exit();
}


$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);


$serverRequest = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
$container = require __DIR__ . '/../config/dependencies.php';
$controlador = $container->get($classeControladora);
$resposta = $controlador->handle($serverRequest);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();