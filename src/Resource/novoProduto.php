<?php
require_once "../../vendor/autoload.php";
$controller = new \App\Controller\ProdutoController();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$produto["id"] = $controller->create($request);
echo json_encode($produto);