<?php

require_once __DIR__."/../vendor/autoload.php";

use Alura\Cursos\Controller\interfaceControllerRequire;


$rotas = require __DIR__."/../config/routes.php";
$caminho = $_SERVER['PATH_INFO'];

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

$eRotaDeLogin = str_contains($caminho, "login");

if(!isset($_SESSION['logado']) && $eRotaDeLogin === false){
    header('Location: /login');
    exit();
}


$classeController = $rotas[$caminho];
/**
 * @var interfaceControllerRequire $controlador
 */
$controlador = new $classeController();
$controlador->processaRequisicao();

            

