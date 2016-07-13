<?php

namespace App\Entity;

class ProdutoMapper extends Produto implements IProdutoMapper
{


    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        return [
            'id'        => $object->getId(),
            'nome'      => $object->getNome(),
            'descricao' => $object->getDescricao(),
            'preco'     => $object->getPreco()
        ];
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $object->setId($data['id']);
        $object->setNome($data['nome']);
        $object->setDescricao($data['descricao']);
        $object->setPreco($data['preco']);
        return $object;
    }
}