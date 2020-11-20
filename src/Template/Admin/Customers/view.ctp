<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink( __('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'nav-link'] ) ?></li>
<li><?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Meals'), ['controller' => 'Meals', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Meal'), ['controller' => 'Meals', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', $this->fetch('tb_actions')); ?>

<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Customer Details') ?></th>
                <td><?= h($customer->Customer_Details) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Contact') ?></th>
                <td><?= h($customer->contact) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($customer->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($customer->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($customer->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Meals') ?></h4>
        <?php if (!empty($customer->meals)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Meal Name Id') ?></th>
                    <th scope="col"><?= __('Customer Id') ?></th>
                    <th scope="col"><?= __('Staff Id') ?></th>
                    <th scope="col"><?= __('Slug') ?></th>
                    <th scope="col"><?= __('Date Of Meal') ?></th>
                    <th scope="col"><?= __('Cost Of Meal') ?></th>
                    <th scope="col"><?= __('Other Details') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($customer->meals as $meals): ?>
                <tr>
                    <td><?= h($meals->id) ?></td>
                    <td><?= h($meals->user_id) ?></td>
                    <td><?= h($meals->meal_name_id) ?></td>
                    <td><?= h($meals->Customer_id) ?></td>
                    <td><?= h($meals->Staff_id) ?></td>
                    <td><?= h($meals->slug) ?></td>
                    <td><?= h($meals->Date_of_meal) ?></td>
                    <td><?= h($meals->Cost_of_meal) ?></td>
                    <td><?= h($meals->Other_details) ?></td>
                    <td><?= h($meals->created) ?></td>
                    <td><?= h($meals->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Meals', 'action' => 'view', $meals->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Meals', 'action' => 'edit', $meals->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Meals', 'action' => 'delete', $meals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meals->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
