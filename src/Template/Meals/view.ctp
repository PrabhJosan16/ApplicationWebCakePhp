<!-- File: src/Template/Meals/view.ctp -->

<h1><?= h($meal->Other_details) ?></h1>
<p><?= h($meal->Cost_of_meal) ?></p>
<p><?= h($meal->Date_of_meal) ?></p>
<p><small>Created: <?= $meal->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $meal->ID]) ?></p>

<?php
    $this->request->session()->write('Meals.id', $meal->id);
    //$this->request->session()->write('Meals.slug', $meal->slug);
    
    echo $this->Html->link(__('New Staff'), ['controller' => 'Staff', 'action' => 'add']);
    ?></p>
<div class="related">
    <h3><?= __('Related Staff') ?></h3>
    <?php if (!empty($meal->staff)): ?>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('First_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Other_details') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Staff_role_code') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meal->staff as $staff): ?>
                    <tr>
                        <td><?= $this->Number->format($staff->id) ?></td>
                        
                        <td><?= h($staff->created) ?></td>
                        <td><?= h($staff->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Staff', 'action' => 'view', $staff->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Staff', 'action' => 'edit', $staff->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Staff', 'action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

