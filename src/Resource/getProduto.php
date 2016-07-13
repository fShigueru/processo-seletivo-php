<?php
require_once "../../vendor/autoload.php";
$controller = new \App\Controller\ProdutoController();
$id = $_GET['id'];
$produto = $controller->editAction($id);
echo json_encode($produto);