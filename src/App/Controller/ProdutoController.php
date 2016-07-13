<?php

namespace App\Controller;

use App\Entity\Produto;

class ProdutoController extends Controller
{

    /**
     * Exibe os produtos na página produtos
     * @return mixed
     */
    public function indexAction()
    {
       $produtos = $this->container['produtoRepository'];
       return $produtos->findAll();
    }

    /**
     * Persiste um novo produto no banco de dados
     *
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $validate = $this->container['produtoValidate'];
        $produtoService = $this->container['produtoService'];

        $produto = new Produto();
        $produto->setNome($request->nome);
        $produto->setDescricao($request->descricao);
        $produto->setPreco((double)$request->preco);

        $validateEntity = $validate->sanitize($produto);
        if($validateEntity['status']){
            return $produtoService->save($produto);
        }

        return $validateEntity;
    }

    /**
     * Exibe um produto, apartir do ID
     *
     * @param $id
     * @return mixed
     */
    public function editAction($id)
    {
        $produtoService = $this->container['produtoService'];
        $produto = new Produto();
        $produto->setId($id);
        return $produtoService->find($produto);
    }

    /**
     * Atualiza os dados de um produto no banco de dados
     *
     * @param $request
     * @return bool
     */
    public function update($request)
    {
        $produtoService = $this->container['produtoService'];
        $produto = new Produto();
        $produto->setId($request->id);
        if(!$produtoService->find($produto))
            return false;

        $validate = $this->container['produtoValidate'];

        $produto = new Produto();
        $produto->setId($request->id);
        $produto->setNome($request->nome);
        $produto->setDescricao($request->descricao);
        $produto->setPreco((double)$request->preco);

        $validateEntity = $validate->sanitize($produto);
        if($validateEntity['status']){
            return $produtoService->update($produto);
        }

        return $validateEntity;
    }

    /**
     * Remove um produto do banco de dados
     *
     * @param $request
     * @return bool
     */
    public function delete($request)
    {
        $produtoService = $this->container['produtoService'];
        $produto = new Produto();
        $produto->setId($request->id);
        if(!$produtoService->find($produto))
            return false;

        $produtoRepository = $this->container['produtoRepository'];
        return $produtoRepository->delete($produto);
    }


}
