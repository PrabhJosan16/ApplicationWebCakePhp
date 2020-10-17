<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($tag->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Meals') ?></h4>
        <?php if (!empty($tag->meals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Customer ID') ?></th>
                <th scope="col"><?= __('Staff ID') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Date Of Meal') ?></th>
                <th scope="col"><?= __('Cost Of Meal') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->meals as $meals): ?>
            <tr>
                <td><?= h($meals->ID) ?></td>
                <td><?= h($meals->user_id) ?></td>
                <td><?= h($meals->Customer_ID) ?></td>
                <td><?= h($meals->Staff_ID) ?></td>
                <td><?= h($meals->slug) ?></td>
                <td><?= h($meals->Date_of_meal) ?></td>
                <td><?= h($meals->Cost_of_meal) ?></td>
                <td><?= h($meals->Other_details) ?></td>
                <td><?= h($meals->created) ?></td>
                <td><?= h($meals->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Meals', 'action' => 'view', $meals->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Meals', 'action' => 'edit', $meals->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Meals', 'action' => 'delete', $meals->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $meals->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
