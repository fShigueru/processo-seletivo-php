<?php

namespace App\Repository;

use App\Conn\IConn;
use App\Entity\IProduto;

class ProdutoRepository implements IProdutoRepository
{

    private $db;
    private $table = "produto";

    public function __construct(IConn $db)
    {
        $this->db = $db->connect();
    }

    public function save(array $produto)
    {
        $query = "INSERT INTO {$this->table}(";
        foreach($produto as $key => $dado){
            $query .= $key.',';
        }
        $query  = preg_replace('/[,]$/','',$query);
        $query .= ")";
        $query.= "VALUES (";
        foreach($produto as $key => $dado){
            $query .= ":".$key.',';
        }
        $query = preg_replace('/[,]$/','',$query);
        $query.= ")";

        try{
            $sql = $this->db->prepare($query);
            foreach($produto as $key => $dado){
                $sql->bindValue(":{$key}",$dado,\PDO::PARAM_STR);
            }
            if($sql->execute())
                return $this->db->lastInsertId();

            return false;
        }catch(\PDOexception $e){
            throw new \PDOexception($e->getMessage());
        }
    }

    public function update(array $produto)
    {
        $query = null;
        $query = "UPDATE {$this->table} SET ";
        foreach($produto as $key => $data){
            if($key != 'id'){
                if($data)
                    $query .= $key.' = :'.$key.',';
            }
        }
        $query = preg_replace('/[,]$/','',$query);
        $query .= " WHERE id = :id";

        try{
            $sql = $this->db->prepare($query);
            foreach($produto as $key => $data){
                if($key != 'id'){
                    if($data)
                        $sql->bindValue("{$key}",$data);
                }
                if($key == 'id'){
                    $sql->bindValue("{$key}", $data,\PDO::PARAM_INT);
                }
            }

            if($sql->execute()){
                return true;
            }
            setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return false;

        }catch(\PDOexception $e){
            throw new \PDOexception($e->getMessage());
        }
    }

    public function delete(IProduto $produto)
    {
        $query = "DELETE FROM {$this->table} WHERE id IN (:id)";

        try{
            $sql = $this->db->prepare($query);
            $sql->bindValue(":id",$produto->getId(),\PDO::PARAM_INT);
            if($sql->execute())
                return true;
            return false;
        }catch(\PDOexception $e){
            throw new \PDOexception($e->getMessage());
        }
    }

    public function findAll()
    {
        $query = 'SELECT * FROM produto GROUP BY id DESC';
        try{
            $sql = $this->db->prepare($query);
            if($sql->execute()){
                return $sql->fetchAll(\PDO::FETCH_ASSOC);
            }
        }catch(\PDOexception $e){
            throw new \PDOexception($e->getMessage());
        }
    }

    public function find(IProduto $produto)
    {
        $query = 'SELECT * FROM produto WHERE id = :id';
        try{
            $sql = $this->db->prepare($query);
            $sql->bindValue(":id",$produto->getId(),\PDO::PARAM_STR);

            if($sql->execute()){
                return $sql->fetch(\PDO::FETCH_ASSOC);
            }

        }catch(\PDOexception $e){
            throw new \PDOexception($e->getMessage());
        }
    }
}