    var onloadCallback = function() {
        widgetId1 = grecaptcha.render('example1', {
            'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
            'theme' : 'light'
        });
    };

var app = angular.module('app', []);
var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';
app.controller('CustomerCrudJwtCtrl', ['$scope', 'CustomerCrudJwtService', function ($scope, CustomerCrudJwtService) {

        $scope.updateCustomer = function () {
            CustomerCrudJwtService.updateCustomer($scope.customer.id, $scope.customer.Customer_Details, $scope.customer.contact)
                    .then(function success(response) {
                        $scope.message = 'Customer data updated!';
                        $scope.errorMessage = '';
                        $scope.getAllCustomers();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating customer!';
                                $scope.message = '';
                            });
        }

        $scope.getCustomer = function () {
            var id = $scope.customer.id;
            CustomerCrudJwtService.getCustomer($scope.customer.id)
                    .then(function success(response) {
                        $scope.customer = response.data.customer;
                        $scope.customer.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Customer not found!';
                                } else {
                                    $scope.errorMessage = "Error getting customer!";
                                }
                            });
        }

        $scope.addCustomer = function () {
            if ($scope.customer != null && $scope.customer.Customer_Details) {
                CustomerCrudJwtService.addCustomer($scope.customer.Customer_Details, $scope.customer.contact)
                        .then(function success(response) {
                            $scope.message = 'Customer added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding customer!';
                                    $scope.message = '';
                                    $scope.getAllCustomers();
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteCustomer = function () {
            CustomerCrudJwtService.deleteCustomer($scope.customer.id)
                    .then(function success(response) {
                        $scope.message = 'Customer deleted!';
                        $scope.customer = null;
                        $scope.errorMessage = '';
                        $scope.getAllCustomers();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting customer!';
                                $scope.message = '';
                            })
        }

        $scope.getAllCustomers = function () {
            CustomerCrudJwtService.getAllCustomers()
                    .then(function success(response) {
                        $scope.customers = response.data.customers;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting customers!';
                            });
        }

        $scope.login = function () {   
            if(grecaptcha.getResponse(widgetId1)==''){
                $scope.captcha_status='Please verify captha.';
                return;
            }
               if ($scope.user != null && $scope.user.username) {
                   CustomerCrudJwtService.login($scope.user)
                           .then(function success(response) {
                               $scope.message = $scope.user.username + ' en session!';
                               $scope.errorMessage = '';
                               localStorage.setItem('token', response.data.data.token);
                               localStorage.setItem('user_id', response.data.data.id);
                           },
                                   function error(response) {
                                       $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                       $scope.message = '';
                                   });
               } else {
                   $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
                   $scope.message = '';
               }

           }
           $scope.logout = function () {
               localStorage.setItem('token', "no token");
               localStorage.setItem('user', "no user");
               $scope.message = '';
               $scope.errorMessage = 'Utilisateur déconnecté!';
           }
           $scope.changePassword = function () {
               CustomerCrudJwtService.changePassword($scope.user.password)
                       .then(function success(response) {
                           $scope.message = 'Mot de passe mis à jour!';
                           $scope.errorMessage = '';
                       },
                               function error(response) {
                                   $scope.errorMessage = 'Mot de passe inchangé!';
                                   $scope.message = '';
                               });
           }
       }]);

app.service('CustomerCrudJwtService', ['$http', function ($http) {

        this.getCustomer = function getCustomer(customerId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + customerId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            });
        }

        this.addCustomer = function addCustomer(Customer_Details, contact) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {Customer_Details: Customer_Details, contact: contact},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }    
            });
        }

        this.deleteCustomer = function deleteCustomer(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.updateCustomer = function updateCustomer(id, Customer_Details, contact) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {Customer_Details: Customer_Details, contact: contact},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.getAllCustomers = function getAllCustomers() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {username: user.username, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }
        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }
    }]);



