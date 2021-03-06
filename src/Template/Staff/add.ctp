<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Staff'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="staff form large-9 medium-8 columns content">
    <?= $this->Form->create($staff) ?>
    <fieldset>
        <legend><?= __('Add Staff') ?></legend>
        <?php
            echo $this->Form->control('Staff_role_code');
            echo $this->Form->control('First_name');
            echo $this->Form->control('Last_name');
            echo $this->Form->control('Other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
