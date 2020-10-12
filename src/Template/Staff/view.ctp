<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staff view large-9 medium-8 columns content">
    <h3><?= h($staff->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($staff->First_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($staff->Last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($staff->Other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($staff->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff Role Code') ?></th>
            <td><?= $this->Number->format($staff->Staff_role_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($staff->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($staff->modified) ?></td>
        </tr>
    </table>
</div>
