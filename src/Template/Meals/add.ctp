<!-- File: src/Template/Meals/add.ctp -->

<h1>Add Meal</h1>
<?php
    echo $this->Form->create($meal);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('Cost_of_meal');
    echo $this->Form->control('Other_details', ['rows' => '3']);
    echo $this->Form->control('tags._ids', ['options' => $tags]);
    echo $this->Form->button(__('Save Meal'));
    echo $this->Form->end();
?>
