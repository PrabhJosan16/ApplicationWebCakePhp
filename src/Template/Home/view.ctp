<h1><?= h($file->name) ?></h1>
<p>
    <?php echo $this->Html->image($file->path.$file->name, [
        "alt" => $file->name,
        ]);
    ?>
</p>
<p><small>Created: <?= $file->created ?></small></p>