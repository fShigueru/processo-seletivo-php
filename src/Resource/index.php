<?php
require_once "../vendor/autoload.php";

use \App\Controller\ProdutoController;

$produto = new ProdutoController();
$produto->indexAction();