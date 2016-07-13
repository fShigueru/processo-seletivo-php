<?php
namespace App\Controller;

use App\Conn\Config;
use App\Conn\Conn;
use App\Entity\ProdutoMapper;
use App\Entity\ProdutoValidate;
use App\Service\ProdutoService;
use Pimple\Container;
use App\Repository\ProdutoRepository;

class Controller
{
    public $container;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->container = new Container();
        $config = new Config();
        $this->container['dsn'] = $config->getDsn();
        $this->container['user'] = $config->getUser();
        $this->container['pass'] = $config->getPass();

        $this->container['conn'] = function($c){
            return new Conn($c['dsn'],$c['user'],$c['pass']);
        };

        $this->container['produtoRepository'] = function($c){
            return new ProdutoRepository($c['conn']);
        };

        $this->container['produtoMapper'] = function(){
            return new ProdutoMapper();
        };

        $this->container['produtoService'] = function($c){
            return new ProdutoService($c['produtoRepository'],$c['produtoMapper']);
        };

        $this->container['produtoValidate'] = function(){
            return new ProdutoValidate();
        };

    }

}