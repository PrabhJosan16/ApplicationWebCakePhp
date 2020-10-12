<!-- File: src/Template/Meals/view.ctp -->

<h1><?= h($meal->Other_details) ?></h1>
<p><?= h($meal->Cost_of_meal) ?></p>
<p><?= h($meal->Date_of_meal) ?></p>
<p><small>Created: <?= $meal->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $meal->slug]) ?></p>
