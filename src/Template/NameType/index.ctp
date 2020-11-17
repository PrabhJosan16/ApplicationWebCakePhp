<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NameType[]|\Cake\Collection\CollectionInterface $nameType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Name Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Meal'), ['controller' => 'TypeMeal', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Meal'), ['controller' => 'TypeMeal', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Meal Name'), ['controller' => 'MealName', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meal Name'), ['controller' => 'MealName', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nameType index large-9 medium-8 columns content">
    <h3><?= __('Name Type') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_dish_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_dish') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nameType as $nameType): ?>
            <tr>
                <td><?= $this->Number->format($nameType->id) ?></td>
                <td><?= $nameType->has('type_meal') ? $this->Html->link($nameType->type_meal->id, ['controller' => 'TypeMeal', 'action' => 'view', $nameType->type_meal->id]) : '' ?></td>
                <td><?= h($nameType->no_type) ?></td>
                <td><?= h($nameType->nom_dish) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nameType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nameType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nameType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nameType->id)]) ?>
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
