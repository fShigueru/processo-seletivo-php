<?php
require_once "../../vendor/autoload.php";
$controller = new \App\Controller\ProdutoController();
$lista = $controller->indexAction();
echo json_encode($lista);