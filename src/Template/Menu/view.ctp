<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menu view large-9 medium-8 columns content">
    <h3><?= h($menu->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Name') ?></th>
            <td><?= h($menu->Menu_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($menu->Other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($menu->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available Date From') ?></th>
            <td><?= h($menu->Available_date_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available Date To') ?></th>
            <td><?= h($menu->Available_date_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($menu->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($menu->modified) ?></td>
        </tr>
    </table>
</div>
