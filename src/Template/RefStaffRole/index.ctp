<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefStaffRole[]|\Cake\Collection\CollectionInterface $refStaffRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Staff Role'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refStaffRole index large-9 medium-8 columns content">
    <h3><?= __('Ref Staff Role') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Staff_role_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refStaffRole as $refStaffRole): ?>
            <tr>
                <td><?= $this->Number->format($refStaffRole->ID) ?></td>
                <td><?= h($refStaffRole->Staff_role_description) ?></td>
                <td><?= h($refStaffRole->created) ?></td>
                <td><?= h($refStaffRole->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refStaffRole->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refStaffRole->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refStaffRole->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $refStaffRole->ID)]) ?>
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
