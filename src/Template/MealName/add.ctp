<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "TypeMeal",
    "action" => "getTypeMeal",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('MealName/add_edit', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MealName $mealName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Meal Name'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="nameMeal form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="TypeMealController">
    <?= $this->Form->create($mealName) ?>
    <fieldset>
        <legend><?= __('Meal type') ?></legend>
        
        <div>
            <?= __('Type') ?> : 
            <select 
                name="type_meal_id"
                id="type-meal-id" 
                ng-model="typeMeal" 
                ng-options="typeMeal.name_meal for typeMeal in typeMeals track by typeMeal.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        
        <div>
            <?= __('Name') ?> : 
            <!-- pre ng-show='typeMeal'>{{ typeMeal | json }}></pre-->
            <select
                name="name_type_id"
                id="name-type-id" 
                ng-disabled="!typeMeal" 
                ng-model="nameType"
                ng-options="nameType.name_meal for nameType in typeMeal.name_type track by nameType.id"
                >
                <option value=''>Select</option>
            </select>
        </div>

        
        
        
        <?php            
          //  echo $this->Form->control('type_meal_id', ['options' => $typeMeal]);
           // echo $this->Form->control('name_type_id', ['options' => [__('Please select a type of meal first')]]); 
            echo $this->Form->control('no_type');
            echo $this->Form->control('name_meal');
        ?>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


