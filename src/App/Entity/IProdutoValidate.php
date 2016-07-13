<?php

namespace App\Entity;


interface IProdutoValidate
{

    /**
     * Valida os dados enviados pela entidade Produto
     *
     * @return mixed
     */
    public function sanitize(IProduto $produto);
}