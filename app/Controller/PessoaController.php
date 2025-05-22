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