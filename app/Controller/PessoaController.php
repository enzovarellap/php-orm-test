<?php

namespace src\Controller;

use src\Model\Pessoa;

class PessoaController
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function list()
    {
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        include __DIR__ . '/../View/pessoa/list.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $cpf = $_POST['cpf'] ?? '';

            // Basic validation (add more as needed)
            if (empty($nome) || empty($cpf)) {
                $error = 'Name and CPF are required.';
                include __DIR__ . '/../View/pessoa/create.php';
                return;
            }

            $pessoa = new \src\Model\Pessoa();
            $pessoa->setNome($nome);
            $pessoa->setCpf($cpf);

            $this->entityManager->persist($pessoa);
            $this->entityManager->flush();

            // Redirect to list or show success
            header('Location: ?controller=pessoa&action=list');
            exit;
        }

        include __DIR__ . '/../View/pessoa/create.php';
    }

    public function edit($id)
    {
    }

    public function show($id)
    {
    }

    public function delete($id)
    {
    }

}