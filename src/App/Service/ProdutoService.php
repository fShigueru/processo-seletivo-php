<?php

namespace App\Service;

use App\Entity\IProduto;
use App\Entity\IProdutoMapper;
use App\Entity\ProdutoMapper;
use App\Repository\IProdutoRepository;

class ProdutoService implements IProdutoService
{

    protected $repository;
    protected $mapper;

    /**
     * ProdutoService constructor.
     * @param $repository
     */
    public function __construct(IProdutoRepository $repository, IProdutoMapper $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }


    /**
     * Hydrate resultado do banco de dados
     *
     * @return mixed
     */
    public function find(IProduto $produto)
    {
        $produtoRepository = $this->repository->find($produto);
        return $produtoRepository;
    }

    public function save(IProduto $produto)
    {
        $array = $this->mapper->extract($produto);
        return $this->repository->save($array);
    }

    public function update(IProduto $produto)
    {
        $array = $this->mapper->extract($produto);
        return $this->repository->update($array);
    }
}