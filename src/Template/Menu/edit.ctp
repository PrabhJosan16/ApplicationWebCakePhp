<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menu->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menu->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Menu'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="menu form large-9 medium-8 columns content">
    <?= $this->Form->create($menu) ?>
    <fieldset>
        <legend><?= __('Edit Menu') ?></legend>
        <?php
            echo $this->Form->control('Menu_name');
            echo $this->Form->control('Available_date_from');
            echo $this->Form->control('Available_date_to');
            echo $this->Form->control('Other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
