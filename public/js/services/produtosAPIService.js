angular.module("psp").factory("produtosApi", function ($http, config){
    var _getProdutos = function () {
        return $http.get(config.baseUrl + "getProdutos.php");
    };

    var _getProduto = function (id) {
        return $http.get(config.baseUrl + "getProduto.php?id=" + id);
    };

    var _editarProduto = function (produto) {
        return $http.post(config.baseUrl + "editarProduto.php", produto);
    };

    var _apagarProduto = function (produto) {
        return $http.post(config.baseUrl + "apagarProduto.php", produto);
    };

    var _novoProduto = function (produto) {
        return $http.post(config.baseUrl + "novoProduto.php", produto);
    };

    return {
        getProdutos: _getProdutos,
        getProduto: _getProduto,
        editarProduto: _editarProduto,
        apagarProduto: _apagarProduto,
        novoProduto: _novoProduto
    };
});