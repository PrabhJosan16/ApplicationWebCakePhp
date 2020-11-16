<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MealName $mealName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Meal Name'), ['action' => 'edit', $mealName->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meal Name'), ['action' => 'delete', $mealName->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $mealName->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Meal Name'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal Name'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mealName view large-9 medium-8 columns content">
    <h3><?= h($mealName->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Meal Name') ?></th>
            <td><?= h($mealName->meal_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($mealName->ID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Meals') ?></h4>
        <?php if (!empty($mealName->meals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Meal Name Id') ?></th>
                <th scope="col"><?= __('Customer ID') ?></th>
                <th scope="col"><?= __('Staff ID') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Date Of Meal') ?></th>
                <th scope="col"><?= __('Cost Of Meal') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mealName->meals as $meals): ?>
            <tr>
                <td><?= h($meals->ID) ?></td>
                <td><?= h($meals->user_id) ?></td>
                <td><?= h($meals->meal_name_id) ?></td>
                <td><?= h($meals->Customer_ID) ?></td>
                <td><?= h($meals->Staff_ID) ?></td>
                <td><?= h($meals->slug) ?></td>
                <td><?= h($meals->Date_of_meal) ?></td>
                <td><?= h($meals->Cost_of_meal) ?></td>
                <td><?= h($meals->Other_details) ?></td>
                <td><?= h($meals->created) ?></td>
                <td><?= h($meals->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Meals', 'action' => 'view', $meals->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Meals', 'action' => 'edit', $meals->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meals', 'action' => 'delete', $meals->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $meals->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
