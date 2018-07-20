<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

      <?php echo $this->element('sidebar'); ?>

</nav>
<div class="athletes form large-9 medium-8 columns content">
    <?= $this->Form->create($athlete) ?>
    <fieldset>
        <legend><?= __('Modifier un compétiteur') ?></legend>
        <?php
        echo $this->Form->control('name', ['label' => 'Nom et prénom du compétiteur']);
        echo $this->Form->control('nbr_match', ['label' => 'Nombre de compétitions officielles']);
        echo $this->Form->control('nbr_km', ['label' => 'Nombre de kilomètres annuels']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
