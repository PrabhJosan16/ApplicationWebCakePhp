var app = angular.module('app', []);

app.controller('CustomerCRUDCtrl', ['$scope', 'CustomerCRUDService', function ($scope, CustomerCRUDService) {

        $scope.updateCustomer = function () {
            CustomerCRUDService.updateCustomer($scope.customer.id, $scope.customer.Customer_Details, $scope.customer.contact)
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
            CustomerCRUDService.getCustomer($scope.customer.id)
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
                CustomerCRUDService.addCustomer($scope.customer.Customer_Details, $scope.customer.contact)
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
            CustomerCRUDService.deleteCustomer($scope.customer.id)
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
            CustomerCRUDService.getAllCustomers()
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

    }]);

app.service('CustomerCRUDService', ['$http', function ($http) {

        this.getCustomer = function getCustomer(customerId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + customerId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.addCustomer = function addCustomer(Customer_Details, contact) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {Customer_Details: Customer_Details, contact: contact},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.deleteCustomer = function deleteCustomer(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.updateCustomer = function updateCustomer(id, Customer_Details, contact) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {Customer_Details: Customer_Details, contact: contact},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
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

    }]);


