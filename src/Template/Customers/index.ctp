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
    <input type="hidden" id="id" ng-model="customer.id" />
    <table>
        <tr>
            <td width="100">Customers details</td>
            <td><input type="text" id="Customer_Details" ng-model="customer.Customer_Details" /></td>
        </tr>
        <tr>
            <td width="100">Contact</td>
            <td><input type="text" id="contact" ng-model="customer.contact" /></td>
        </tr>
    </table>
    <button ng-click="updateCustomer(customer)">Update Customer</button>
    <button ng-click="addCutomer(customer.Customer_Details, customer.contact)">Add Customer</button>
    
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>
    

    
    <table class=' hoverable bordered'>
        <thead>
            <tr>
                <th class='text-align-center' ng-init="getAllCustomers()">ID</th>
                <th class='width-30-pct'> Name(details)</th>
                <th class='width-30-pct'>Contact</th>
                <th class='text-align-center'>Actions</th>
            </tr>
        </thead>
        
        <tbody ng-init="getAllCustomers()">
            <tr ng-repeat="customer in customers| filter:search">
                <td class='text-align-center'>
                    {{customer.id}}                
                </td>
                <td>
                   {{customer.Customer_Details}} 
                </td>
                 <td>
                   {{customer.contact}} 
                </td>
                <td>
                    <button type='button' class='btn btn-warning btn-sm' ng-click='getCustomer(customer.id)'>Edit</button>
                    <button type='button' class='btn btn-warning btn-sm' ng-click='deleteCustomer(customer.id)'>Delete</button>
                </td>
                
            </tr>
        </tbody>  
    </table>


  

</div>

