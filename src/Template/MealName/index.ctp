<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MealName[]|\Cake\Collection\CollectionInterface $mealName
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Meal Name'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mealName index large-9 medium-8 columns content">
    <h3><?= __('Meal Name') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meal_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mealName as $mealName): ?>
            <tr>
                <td><?= $this->Number->format($mealName->id) ?></td>
                <td><?= h($mealName->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mealName->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mealName->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mealName->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mealName->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
