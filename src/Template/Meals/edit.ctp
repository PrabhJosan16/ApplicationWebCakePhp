<!-- File: src/Template/Meals/edit.ctp -->
<?php
$urlToMealsNameAutocompletedemoJson = $this->Url->build([
    "controller" => "MealName",
    "action" => "findMealName",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToMealsNameAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Meals/add_edit/mealsNameAutocomplete', ['block' => 'scriptBottom']);
?>

<div class="meals form large-9 medium-8 columns content">
<?= $this->Form->create($meal) ?>
    <fieldset>
        <legend><?= __('Edit Meal') ?></legend>
        <?php
        echo $this->Form->control('user_id', ['type' => 'hidden']);
        echo $this->Form->control('Cost_of_meal');
        echo $this->Form->control('meal_name_id', ['label' => ('Meals') . ' (' . __('Autocomplete demo') . ')', 'type' => 'hidden'/*, 'id' => 'autocomplete'*/]);
        ?>
         <div class="input text">
         <label for="autocomplete"><?=__("Meal"). ' (' .__('Autocomplete'). ')' ?></label>
         <input id="autocomplete" type="text">
        </div>
        <?php
        echo $this->Form->control('Other_details', ['rows' => '3']);
        echo $this->Form->control('tags._ids', ['options' => $tags]);
        echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save Meal')) ?>
<?= $this->Form->end() ?>
</div>
