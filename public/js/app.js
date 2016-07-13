'use strict';

var psp = angular.module("psp", [
    'ngRoute',
    "ngMessages"
]);

psp.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider.
        when('/', {
            templateUrl: 'partials/main.html',
            controller: 'ProdutoCtrl'
        }).when('/edit/:id', {
            templateUrl: 'partials/edit.html',
            controller: 'ProdutoEditCtrl'
        }).when('/new', {
            templateUrl: 'partials/new.html',
            controller: 'ProdutoNewCtrl'
        });

        $locationProvider.html5Mode(false).hashPrefix('!');
    }]);



