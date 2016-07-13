<?php

namespace App\Entity;

class ProdutoValidate implements IProdutoValidate
{
    public function sanitize(IProduto $produto)
    {
        $retorno = [
            'status'=>true,
            'message'=>''
        ];

        if(!empty($produto->getId())){
            if(!filter_var($produto->getId() , FILTER_VALIDATE_INT)){
                $retorno['status'] = false;
                $retorno['message'] = 'ID enviado não é válido';
                return $retorno;
            }
        }

        if(!empty($produto->getPreco())){
            if(!filter_var($produto->getPreco() , FILTER_VALIDATE_FLOAT)){
                $retorno['status'] = false;
                $retorno['message'] = 'O Preço enviado não é válido';
                return $retorno;
            }
        }

        $produto->setId(strip_tags(trim(filter_var($produto->getId() , FILTER_SANITIZE_NUMBER_INT))));
        $produto->setNome(strip_tags(trim(filter_var($produto->getNome() , FILTER_SANITIZE_STRING))));
        $produto->setDescricao(strip_tags(trim(filter_var($produto->getDescricao() , FILTER_SANITIZE_STRING))));
        $produto->setPreco(strip_tags(trim(filter_var($produto->getPreco() , FILTER_SANITIZE_NUMBER_FLOAT))));

        $retorno['produto'] = $produto;
        return $retorno;
    }
}