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

    public function list(): void
    {
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        include __DIR__ . '/../View/pessoa/list.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $cpf = $_POST['cpf'] ?? '';

            if (empty($nome) || empty($cpf)) {
                $error = 'Name and CPF are required.';
                include __DIR__ . '/../View/pessoa/create.php';
                return;
            }

            $pessoa = new Pessoa();
            $pessoa->setNome($nome);
            $pessoa->setCpf($cpf);

            $this->entityManager->persist($pessoa);
            $this->entityManager->flush();

            header('Location: ?controller=pessoa&action=list');
            exit;
        }

        include __DIR__ . '/../View/pessoa/create.php';
    }

    public function edit($id): void
    {
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);
        if (!$pessoa) {
            header('HTTP/1.0 404 Not Found');
            echo 'Pessoa not found';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $cpf = $_POST['cpf'] ?? '';

            if (empty($nome) || empty($cpf)) {
                $error = 'Name and CPF are required.';
                include __DIR__ . '/../View/pessoa/edit.php';
                return;
            }

            $pessoa->setNome($nome);
            $pessoa->setCpf($cpf);

            $this->entityManager->flush();

            header('Location: ?controller=pessoa&action=list');
            exit;
        }

        include __DIR__ . '/../View/pessoa/edit.php';
    }

    public function show(int $id): void
    {
    }

    public function delete(int $id): void
    {
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);
        if (!$pessoa) {
            header('HTTP/1.0 404 Not Found');
            echo 'Pessoa not found';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->entityManager->remove($pessoa);
            $this->entityManager->flush();
            header('Location: ?controller=pessoa&action=list');
            exit;
        }

        echo 'Invalid request method.';
        exit;
    }

}