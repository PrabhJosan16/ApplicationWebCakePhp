<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NameType $nameType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Name Type'), ['action' => 'edit', $nameType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Name Type'), ['action' => 'delete', $nameType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nameType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Name Type'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Name Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Meal'), ['controller' => 'TypeMeal', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Meal'), ['controller' => 'TypeMeal', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meal Name'), ['controller' => 'MealName', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal Name'), ['controller' => 'MealName', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nameType view large-9 medium-8 columns content">
    <h3><?= h($nameType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Meal') ?></th>
            <td><?= $nameType->has('type_meal') ? $this->Html->link($nameType->type_meal->id, ['controller' => 'TypeMeal', 'action' => 'view', $nameType->type_meal->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Type') ?></th>
            <td><?= h($nameType->no_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom Dish') ?></th>
            <td><?= h($nameType->nom_dish) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nameType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Meal Name') ?></h4>
        <?php if (!empty($nameType->meal_name)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type Meal Id') ?></th>
                <th scope="col"><?= __('Name Type Id') ?></th>
                <th scope="col"><?= __('Meal Name') ?></th>
                <th scope="col"><?= __('No Type') ?></th>
                <th scope="col"><?= __('Nom Dish') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nameType->meal_name as $mealName): ?>
            <tr>
                <td><?= h($mealName->id) ?></td>
                <td><?= h($mealName->type_meal_id) ?></td>
                <td><?= h($mealName->name_type_id) ?></td>
                <td><?= h($mealName->meal_name) ?></td>
                <td><?= h($mealName->no_type) ?></td>
                <td><?= h($mealName->nom_dish) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MealName', 'action' => 'view', $mealName->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MealName', 'action' => 'edit', $mealName->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MealName', 'action' => 'delete', $mealName->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mealName->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
