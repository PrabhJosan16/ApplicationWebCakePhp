<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeMeal[]|\Cake\Collection\CollectionInterface $typeMeal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Type Meal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meal Name'), ['controller' => 'MealName', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal Name'), ['controller' => 'MealName', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeMeal index large-9 medium-8 columns content">
    <h3><?= __('Type Meal') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_dish') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeMeal as $typeMeal): ?>
            <tr>
                <td><?= $this->Number->format($typeMeal->id) ?></td>
                <td><?= h($typeMeal->no_type) ?></td>
                <td><?= h($typeMeal->name_dish) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typeMeal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeMeal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeMeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeMeal->id)]) ?>
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
