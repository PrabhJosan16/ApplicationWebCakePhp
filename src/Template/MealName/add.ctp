<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "NameType",
    "action" => "getByNameType",
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
<div class="mealName form large-9 medium-8 columns content">
    <?= $this->Form->create($mealName) ?>
    <fieldset>
        <legend><?= __('Add Meal Name') ?></legend>
        <?php
            
            echo $this->Form->control('type_meal_id', ['options' => $typeMeal]);
            echo $this->Form->control('name_type_id', ['options' => [__('Please select a type of meal first')]]);
            echo $this->Form->control('no_type');
            echo $this->Form->control('name_meal');
        ?>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
