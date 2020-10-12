<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu Item'), ['action' => 'edit', $menuItem->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu Item'), ['action' => 'delete', $menuItem->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $menuItem->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menuItems view large-9 medium-8 columns content">
    <h3><?= h($menuItem->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu Item Name') ?></th>
            <td><?= h($menuItem->Menu_item_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($menuItem->Other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($menuItem->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu ID') ?></th>
            <td><?= $this->Number->format($menuItem->Menu_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($menuItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($menuItem->modified) ?></td>
        </tr>
    </table>
</div>
