<?php

namespace App\Repository;

use App\Entity\IProduto;

/**
 * Interface IProdutoRepository
 * @package App\Repository
 */
interface IProdutoRepository
{

    /**
     * Salvar um produto no banco de dados
     *
     * @param $produto
     * @return mixed
     */
    public function save(array $produto);

    /**
     * Atualizar um produto no banco de dados
     *
     * @param array $produto
     * @return mixed
     */
    public function update(array $produto);

    /**
     * Excluir um produto no banco de dados
     *
     * @param IProduto $produto
     * @return mixed
     */
    public function delete(IProduto $produto);

    /**
     * Buscar todos os produtos no banco de dados
     *
     * @return mixed
     */
    public function findAll();

    /**
     * Buscar um produto no banco de dados
     *
     * @param IProduto $produto
     * @return mixed
     */
    public function find(IProduto $produto);

}