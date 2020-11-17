<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeMeal $typeMeal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Type Meal'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Meal Name'), ['controller' => 'MealName', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal Name'), ['controller' => 'MealName', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeMeal form large-9 medium-8 columns content">
    <?= $this->Form->create($typeMeal) ?>
    <fieldset>
        <legend><?= __('Add Type Meal') ?></legend>
        <?php
            echo $this->Form->control('no_type');
            echo $this->Form->control('name_dish');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
