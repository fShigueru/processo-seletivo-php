angular.module("psp").controller("ProdutoCtrl", function($scope,produtosApi){

    $scope.menu = true;
    var carregarProdutos = function () {
        produtosApi.getProdutos().success(function (data) {
            $scope.produtos = data;
        }).error(function (data, status) {
            alert('Não foi possivel carregar os dados!');
        });
    };

    $scope.apagarProduto = function (produto) {
        console.log(produto);
        produtosApi.apagarProduto(produto).success(function (data) {
            carregarProdutos();
            alert('Produto ' + produto.nome + ' removido com sucesso!');
        }).error(function (data, status) {
            alert('Erro ao remover o produto');
        });
    };

    carregarProdutos();
});

angular.module("psp").controller("ProdutoEditCtrl", function($scope,produtosApi,$routeParams){

    var carregarProduto = function () {
        produtosApi.getProduto($routeParams.id).success(function (data) {
           $scope.produto = data;
        }).error(function (data, status) {
           $scope.error = "Não foi possivel carregar os dados!";
        });
    };
    carregarProduto();

    $scope.editarProduto = function (produto) {
        produtosApi.editarProduto(produto).success(function (data) {
            alert('Produto ' + produto.nome + ' alterado com sucesso!');
        }).error(function (data, status) {
            alert(data['message']);
        });
    };
});

angular.module("psp").controller("ProdutoNewCtrl", function($scope,produtosApi){
    $scope.novoProduto = function (produto) {
        produtosApi.novoProduto(produto).success(function (data) {
            alert('Produto ' + produto.nome + ' cadastrado com sucesso!');
            window.location.href = "/psp_ph5/public/#!/edit/" + data.id;
        }).error(function (data, status) {
            alert(data['message']);
        });
    };
});