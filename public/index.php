<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once "../bootstrap.php";



// Simple router
$controller = $_GET['controller'] ?? 'pessoa';
$action = $_GET['action'] ?? 'list';

switch ($controller) {
    case 'pessoa':
        $ctrl = new \src\Controller\PessoaController($entityManager);
        break;
    // Add other controllers here
    default:
        http_response_code(404);
        exit('Controller not found');
}

if (method_exists($ctrl, $action)) {
    $ctrl->$action($_GET['id'] ?? null);
} else {
    http_response_code(404);
    exit('Action not found');
}


/*Create Pessoa
 *
 * $pessoa = new src\Pessoa();
    $pessoa->setNome("João da Silva");
    $pessoa->setCpf("123.456.789-00");

    $entityManager->persist($pessoa);
    $entityManager->flush();

    echo "Pessoa cadastrada com ID: " . $pessoa->getId() . "\n";
    echo "Pessoa cadastrada com nome: " . $pessoa->getNome() . "\n";
    echo "Pessoa cadastrada com CPF: " . $pessoa->getCpf() . "\n";
*/



/* Get Pessoa
 *
 * $id = 1;
$pessoa = $entityManager->find(\src\Pessoa::class, $id);

if ($pessoa === null) {
    echo "Pessoa not found.";
    exit(1);
}

echo "Nome: ".$pessoa->getNome().", CPF: ".$pessoa->getCpf()
;*/


/*Update Pessoa
 *
 * $id = 1;
$pessoa = $entityManager->find(\src\Pessoa::class, $id);

if ($pessoa === null) {
    echo "Pessoa not found.";
    exit(1);
}

$pessoa->setNome("Maria da Silva");
$entityManager->flush();

echo "Pessoa updated with ID: " . $pessoa->getId() . "\n";*/

/*Delete pessoa
 *
 * $id = 1;
$pessoa = $entityManager->find(\src\Pessoa::class, $id);

if ($pessoa === null) {
    echo "Pessoa not found.";
    exit(1);
}

$entityManager->remove($pessoa);
$entityManager->flush();

echo "Deleted Pessoa with ID $id";*/