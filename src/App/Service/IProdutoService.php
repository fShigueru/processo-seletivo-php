<?php

namespace App\Service;

use App\Entity\IProduto;

interface IProdutoService
{
    /**
     * Hydrate resultado do banco de dados
     *
     * @return mixed
     */
    public function find(IProduto $produto);

    public function save(IProduto $produto);

    public function update(IProduto $produto);

}