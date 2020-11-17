<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NameType $nameType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nameType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nameType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Name Type'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Type Meal'), ['controller' => 'TypeMeal', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Meal'), ['controller' => 'TypeMeal', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meal Name'), ['controller' => 'MealName', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal Name'), ['controller' => 'MealName', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nameType form large-9 medium-8 columns content">
    <?= $this->Form->create($nameType) ?>
    <fieldset>
        <legend><?= __('Edit Name Type') ?></legend>
        <?php
            echo $this->Form->control('type_dish_id', ['options' => $typeMeal]);
            echo $this->Form->control('no_type');
            echo $this->Form->control('nom_dish');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
