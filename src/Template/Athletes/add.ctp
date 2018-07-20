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
        <legend><?= __('Ajouter un compétiteur') ?></legend>
        <?php
            $session = $this->request->session();
            echo $this->Form->control('name', ['label' => 'Nom et prénom du compétiteur']);
            echo $this->Form->control('nbr_match', ['label' => 'Nombre de compétitions officielles']);
            echo $this->Form->control('nbr_km', ['label' => 'Nombre de kilomètres annuels']);
            echo $this->Form->control('association_id', ['type' => 'hidden',
                                                         'value' => $session->read('association_id')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
