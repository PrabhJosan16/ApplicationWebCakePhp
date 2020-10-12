<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Menu Items'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="menuItems form large-9 medium-8 columns content">
    <?= $this->Form->create($menuItem) ?>
    <fieldset>
        <legend><?= __('Add Menu Item') ?></legend>
        <?php
            echo $this->Form->control('Menu_ID');
            echo $this->Form->control('Menu_item_name');
            echo $this->Form->control('Other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
