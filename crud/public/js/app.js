'use strict';
angular.module('crudApp', [])
        .factory('api', ['$http', function ($http) {
                var sdo = {
                    get: function (url) {
                        var request = $http({method: 'GET', url: url})
                                .success(function (data, status, headers, config) {
                                    return data;
                                })
                                .error(function (data) {
                                    if (data && data.detail) {
                                        console.log(data.detail);
                                    }
                                })
                                ;
                        return request;
                    },
                    post: function (url, dataRequest) {
                        var request = $http({method: 'POST', url: url, data: dataRequest})
                                .success(function (data, status, headers, config) {
                                    return data;
                                })
                                .error(function (data) {
                                    console.log(data.detail);
                                })
                                ;
                        return request;
                    },
                    put: function (url, dataRequest) {
                        var request = $http({method: 'PUT', url: url, data: dataRequest})
                                .success(function (data, status, headers, config) {
                                    return data;
                                })
                                .error(function (data) {
                                    console.log(data.detail);
                                })
                                ;
                        return request;
                    },
                    delete: function (url) {
                        var request = $http({method: 'DELETE', url: url})
                                .success(function (data, status, headers, config) {
                                    return data;
                                })
                                .error(function (data) {
                                    console.log(data.detail);
                                })
                                ;
                        return request;
                    }
                };
                return sdo;
            }])
        .controller('ClienteController', ['$scope', 'api', function ($scope, api) {
                $scope.getNumber = function (num) {
                    return new Array(num);
                }
                $scope.searchTimeout = 0;
                $scope.search = function () {
                    if ($scope.searchTimeout) {
                        clearTimeout($scope.searchTimeout);
                    }
                    $scope.searchTimeout = setTimeout(function () {
                        $scope.navigate('http://localhost:8888/cliente?nome='
                                + $scope.searchText
                                + '&sobrenome=' + $scope.searchText);
                    }, 400);
                }
                $scope.navigate = function (url, page) {
                    var base = url.split('?')[0];
                    var query = url.split('?')[1];
                    var params = {};
                    if (query) {
                        var string_values = query.split('&');
                        for (var i = 0; i < string_values.length; i++)
                        {
                            params[string_values[i].split('=')[0]] = string_values[i].split('=')[1];
                        }
                    }
                    if (page) {
                        params.page = page;
                    }
                    if ($(params).length) {
                        url = base + '?' + $.param(params);
                    }
                    $scope.currentPage = url;
                    api.get(url).success(function (data, header) {
                        $scope.paginator = data;
                        if (params.page) {
                            $scope.paginator.pageActive = params.page;
                        }
                        else {
                            $scope.paginator.pageActive = 1;
                        }
                    }).error(function (data, status) {
                        if (data.detail == 'Invalid page provided' && status == 409) {
                            if (params.page && params.page > 1) {
                                $scope.navigate(url, params.page - 1);
                            }
                        }
                    });
                }
                $scope.navigate('http://localhost:8888/cliente');

                $scope.excluir = function (url) {
                    if (confirm("Remover?")) {
                        api.delete(url)
                                .success(function () {
                                    alert('Registro removido');
                                    console.log($scope.currentPage);
                                    $scope.navigate($scope.currentPage);
                                })
                                .error(function (data) {
                                    alert('Erro ao excluir');
                                    console.log(data);
                                })
                                ;
                    }
                };
            }])
        .controller('ClienteFormController', ['$scope', 'api',
            function ($scope, api) {
                $scope.form = {};
                $scope.inicializar = function(id){
                    $scope.form.id = id;
                    if(id != ''){
                        api.get('http://localhost:8888/cliente/' + id).success(function (data) {
                                $scope.form = data;
                            });
                    }
                }                
                $scope.salvar = function () {
                    var data = {
                        id: $scope.form.id == "" ? null : $scope.form.id,
                        nome: $scope.form.nome,
                        sobrenome: $scope.form.sobrenome
                    };
                    if (data.id && data.id > 0) {
                        api.put('http://localhost:8888/cliente/' + $scope.form.id, data)
                                .success(function (data) {
                                    alert('Registro atualizado com sucesso');
                                })
                                .error(function (data) {
                                    var messages = [];
                                    if (data.validation_messages) {
                                        for (var i in data.validation_messages) {
                                            for (var k in data.validation_messages[i]) {
                                                messages.push(data.validation_messages[i][k]);
                                            }
                                        }
                                    }
                                    alert('Erro ao atualizar' + messages.join(', '));
                                    console.log(data);
                                })
                                ;
                    }
                    else {
                        api.post('http://localhost:8888/cliente', data)
                                .success(function (data) {
                                    alert('Registro inserido com sucesso');
                                    $scope.form.id = data.id;
                                })
                                .error(function (data) {
                                    var messages = [];
                                    if (data.validation_messages) {
                                        for (var i in data.validation_messages) {
                                            for (var k in data.validation_messages[i]) {
                                                messages.push(data.validation_messages[i][k]);
                                            }
                                        }
                                    }
                                    alert('Erro ao salvar ' + messages.join(', '));
                                    console.log(data);
                                })
                                ;
                    }
                }
            }]);