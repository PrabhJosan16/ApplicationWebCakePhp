<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="staff index large-9 medium-8 columns content">
    <h3><?= __('Staff') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Staff_role_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('First_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Other_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staff as $staff): ?>
            <tr>
                <td><?= $this->Number->format($staff->ID) ?></td>
                <td><?= $this->Number->format($staff->Staff_role_code) ?></td>
                <td><?= h($staff->First_name) ?></td>
                <td><?= h($staff->Last_name) ?></td>
                <td><?= h($staff->Other_details) ?></td>
                <td><?= h($staff->created) ?></td>
                <td><?= h($staff->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $staff->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->ID)]) ?>
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
