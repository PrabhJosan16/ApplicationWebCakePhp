<!-- File: src/Template/Meals/edit.ctp -->


<div class="meals form large-9 medium-8 columns content">
<?= $this->Form->create($meal) ?>
    <fieldset>
        <legend><?= __('Edit Meal') ?></legend>
        <?php
        echo $this->Form->control('user_id', ['type' => 'hidden']);
        echo $this->Form->control('Cost_of_meal');
        echo $this->Form->control('Other_details', ['rows' => '3']);
        echo $this->Form->control('tags._ids', ['options' => $tags]);
        echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save Meal')) ?>
<?= $this->Form->end() ?>
</div>
