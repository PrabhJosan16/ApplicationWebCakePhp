<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MealName $mealName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mealName->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mealName->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Meal Name'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mealName form large-9 medium-8 columns content">
    <?= $this->Form->create($mealName) ?>
    <fieldset>
        <legend><?= __('Edit Meal Name') ?></legend>
        <?php
            echo $this->Form->control('meal_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
