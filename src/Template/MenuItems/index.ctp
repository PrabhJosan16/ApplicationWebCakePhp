<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem[]|\Cake\Collection\CollectionInterface $menuItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Menu Item'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menuItems index large-9 medium-8 columns content">
    <h3><?= __('Menu Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Menu_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Menu_item_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Other_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menuItems as $menuItem): ?>
            <tr>
                <td><?= $this->Number->format($menuItem->ID) ?></td>
                <td><?= $this->Number->format($menuItem->Menu_ID) ?></td>
                <td><?= h($menuItem->Menu_item_name) ?></td>
                <td><?= h($menuItem->Other_details) ?></td>
                <td><?= h($menuItem->created) ?></td>
                <td><?= h($menuItem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $menuItem->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menuItem->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menuItem->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->ID)]) ?>
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
