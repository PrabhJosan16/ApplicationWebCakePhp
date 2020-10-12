<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefStaffRole $refStaffRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $refStaffRole->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $refStaffRole->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ref Staff Role'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="refStaffRole form large-9 medium-8 columns content">
    <?= $this->Form->create($refStaffRole) ?>
    <fieldset>
        <legend><?= __('Edit Ref Staff Role') ?></legend>
        <?php
            echo $this->Form->control('Staff_role_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
