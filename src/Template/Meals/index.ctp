<!-- File: src/Template/Meals/index.ctp  (edit links added) -->

<h1>Meals</h1>
<p><?= $this->Html->link("Add Meal", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Meal</th>
        <th>Price</th>
        <th>Date</th>
        <th>By</th>
        <th>File</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here's where we iterate through our $meals query object, printing out meal info -->

<?php foreach ($meals as $meal): ?>
    <tr>
      
        <td>
            <?= $this->Html->link($meal->Other_details, ['action' => 'view', $meal->id]) ?>
        </td>
        <td>
            <?= $meal->Cost_of_meal ?>
        </td>
         <td>
            <?= $meal->Date_of_meal ?>
        </td>
        <td>
            <?= $meal->has('user') ? $this->Html->link($meal->user->email, ['controller' => 'Users', 'action' => 'view', $meal->user->id]) : '' ?>
        </td>
        <td><?php
                        if (isset($meal->files[0])) {
                            echo $this->Html->image($meal->files[0]->path . $meal->files[0]->name, [
                                "alt" => $meal->files[0]->name,
                                "width" => "220px",
                                "height" => "150px",
                                'url' => ['controller' => 'Files', 'action' => 'view', $meal->files[0]->id]
                            ]);
                        }
                        ?>
        </td>
        <td>
            <?= $meal->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $meal->id]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $meal->id],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>
