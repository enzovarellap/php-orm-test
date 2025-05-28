<?php

use src\Controller\ContatoController;
use src\Controller\PessoaController;

require_once __DIR__ . '/../vendor/autoload.php';
require_once "../bootstrap.php";


$controller = $_GET['controller'] ?? 'pessoa';
$action = $_GET['action'] ?? 'list';

switch ($controller) {
    case 'pessoa':
        $ctrl = new PessoaController($entityManager);
        break;

    case 'contato':
        $ctrl = new ContatoController($entityManager);
        break;

    default:
        http_response_code(404);
        exit('Controller não encontrado');
}

if (method_exists($ctrl, $action)) {
    $ctrl->$action($_GET['id'] ?? null);
} else {
    http_response_code(404);
    exit('Ação não encontrada');
}
