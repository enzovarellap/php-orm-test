<?php

namespace src\Controller;

use src\Model\Contato;
use src\Model\Pessoa;

class ContatoController
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function list(): void
    {
        $contatos = $this->entityManager->getRepository(Contato::class)->findAll();
        include __DIR__ . '/../View/contato/list.php';
    }

    public function create(): void
    {
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = isset($_POST['tipo']) ? (bool)$_POST['tipo'] : null;
            $descricao = $_POST['descricao'] ?? '';
            $pessoaId = $_POST['pessoa_id'] ?? '';

            if ($tipo === null || empty($descricao) || empty($pessoaId)) {
                $error = 'Tipo, Descrição e Pessoa são obrigatórios.';
                include __DIR__ . '/../View/contato/create.php';
                return;
            }

            $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($pessoaId);
            if (!$pessoa) {
                $error = 'Pessoa inválida.';
                include __DIR__ . '/../View/contato/create.php';
                return;
            }

            $contato = new Contato();
            $contato->setTipo($tipo);
            $contato->setDescricao($descricao);
            $contato->setPessoa($pessoa);

            $this->entityManager->persist($contato);
            $this->entityManager->flush();

            header('Location: ?controller=contato&action=list');
            exit;
        }

        include __DIR__ . '/../View/contato/create.php';
    }

    public function edit(int $id): void
    {
        $contato = $this->entityManager->getRepository(Contato::class)->find($id);
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();

        if (!$contato) {
            header('HTTP/1.0 404 Not Found');
            echo 'Contato não encontrado';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $pessoaId = $_POST['pessoa_id'] ?? '';

            if ($tipo === '' || $descricao === '' || $pessoaId === '') {
                $error = 'Tipo, Descrição e Pessoa são obrigatórios.';
                include __DIR__ . '/../View/contato/edit.php';
                return;
            }

            $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($pessoaId);
            if (!$pessoa) {
                $error = 'Pessoa inválida.';
                include __DIR__ . '/../View/contato/edit.php';
                return;
            }

            $contato->setTipo($tipo);
            $contato->setDescricao($descricao);
            $contato->setPessoa($pessoa);

            $this->entityManager->flush();

            header('Location: ?controller=contato&action=list');
            exit;
        }

        include __DIR__ . '/../View/contato/edit.php';
    }



    public function delete(int $id): void
    {
        $contato = $this->entityManager->getRepository(Contato::class)->find($id);
        if (!$contato) {
            header('HTTP/1.0 404 Not Found');
            echo 'Contato não encontrado';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->entityManager->remove($contato);
            $this->entityManager->flush();
            header('Location: ?controller=contato&action=list');
            exit;
        } else {
            echo 'Invalid request method.';
            exit;
        }
    }


    public function show($id)
    {
        $contato = $this->entityManager->getRepository(Contato::class)->find($id);
        if (!$contato) {
            header('HTTP/1.0 404 Not Found');
            echo 'Contato não encontrado';
            exit;
        }

        include __DIR__ . '/../View/contato/show.php';
    }




}