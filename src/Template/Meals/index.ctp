<!-- File: src/Template/Meals/index.ctp  (edit links added) -->

<h1>Meals</h1>
<p><?= $this->Html->link("Add Meal", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Meal</th>
        <th>Price</th>
        <th>Date</th>
        <th>By</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here's where we iterate through our $meals query object, printing out meal info -->

<?php foreach ($meals as $meal): ?>
    <tr>
        <td>
            <?= $this->Html->link($meal->Other_details, ['action' => 'view', $meal->slug]) ?>
        </td>
        <td>
            <?= $meal->Cost_of_meal ?>
        </td>
         <td>
            <?= $meal->Date_of_meal ?>
        </td>
        <td>
            <?= $meal->user_id ?>
        </td>
        <td>
            <?= $meal->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $meal->slug]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $meal->slug],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>
