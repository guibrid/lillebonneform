<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
      <?php echo $this->element('sidebar'); ?>
</nav>
<div class="levels form large-9 medium-8 columns content">
    <?= $this->Form->create($level) ?>
    <fieldset>
        <legend><?= __('Nombre de compétiteurs') ?></legend>
        <?php
            echo $this->Form->control('value', ['label' => h($level->name)]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
