<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Customers'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Customers/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="CustomerCRUDCtrl">
    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="customer.id" /></td>
        </tr>
        <tr>
            <td width="100">Customers details</td>
            <td><input type="text" id="Customer_Details" ng-model="customer.Customer_Details" /></td>
        </tr>
        <tr>
            <td width="100">Contact</td>
            <td><input type="text" id="contact" ng-model="customer.contact" /></td>
        </tr>
    </table>
    <br /> <br /> 
    <a ng-click="getCustomer(customer.id)">Get Customer</a> 
    <a ng-click="updateCustomer(customer.id, customer.Customer_Details, customer.contact)">Update Customer</a> 
    <a ng-click="addCutomer(customer.Customer_Details, customer.contact)">Add Customer</a> 
    <a ng-click="deleteCustomer(customer.id)">Delete Customer</a>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />
    <br /> 
    <a ng-click="getAllCustomers()">Get all Customers</a><br /> 
    <br /> <br />
    <div ng-repeat="customer in customers">
        {{customer.id}} {{customer.Customer_Details}} {{customer.contact}}
    </div>
    <!-- pre ng-show='krajRegions'>{{krajRegions | json }}</pre-->
</div>

