<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
    'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Customers'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Customers/index', ['block' => 'scriptBottom']);
?>

<?php
use Cake\Utility\Security;
echo Security::salt();
?>

<div  ng-app="app" ng-controller="CustomerCrudJwtCtrl">
    
    
    <div id="example1"></div> 
    <p style="color:red;">{{ captcha_status }}</p>
    
    
     <table>
        <tr>
            <td width="200">Utilisateur (username):</td>
            <td><input type="text" id="username" ng-model="user.username" /></td>
        </tr>
        <tr>
            <td width="200">Mot de passe (password):</td>
            <td><input type="text" id="password" ng-model="user.password" /></td>
        </tr>
        <tr>
        <a ng-click="login(user)">[Connexion] </a>
        <a ng-click="logout()">[Déconnexion] </a>
        <a ng-click="changePassword(user.password)">[Changer le mot de passe]</a>              
        </tr>
    </table>
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>  
    
    
    
    
    
    
   <table>
        <tr>
            <td width="150">ID:</td>
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
    <a ng-click="addCustomer(customer.Customer_Details, customer.contact)">Add Customer</a> 
    <a ng-click="deleteCustomer(customer.id)">Delete Customer</a>

    <br /> <br />
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

