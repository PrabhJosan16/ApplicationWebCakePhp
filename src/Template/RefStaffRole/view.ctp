<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefStaffRole $refStaffRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Staff Role'), ['action' => 'edit', $refStaffRole->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Staff Role'), ['action' => 'delete', $refStaffRole->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $refStaffRole->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Staff Role'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Staff Role'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refStaffRole view large-9 medium-8 columns content">
    <h3><?= h($refStaffRole->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Staff Role Description') ?></th>
            <td><?= h($refStaffRole->Staff_role_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($refStaffRole->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($refStaffRole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($refStaffRole->modified) ?></td>
        </tr>
    </table>
</div>
