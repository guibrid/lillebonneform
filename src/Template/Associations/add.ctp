<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="associations index large-9 medium-8 columns content">
    <h2><?= __('Associations') ?></h2>
    <?= $this->Form->create($association, ['type' => 'file']) ?>
    <fieldset>
      <legend>Ajouter une association</legend>
        <?php
            echo $this->Form->control('name', [
                                        'label' => 'Nom de l\'association'
                                    ]);
        ?>
        <h4><?= __('Nombre de licenciés') ?></h4>
        <?php
            echo $this->Form->control('licence_moins15', [
                                        'label' => 'Moins de 15 ans (2001 et après)'
                                    ]);
            echo $this->Form->control('licence_moins15Compet', [
                                        'label' => 'Moins de 15 ans pratiquant la compétition'
                                    ]);
            echo $this->Form->control('licence_plus15', [
                                        'label' => 'Plus de 15 ans (2000 et avant)'
                                    ]);
            echo $this->Form->control('licence_doc', [
                                        'label' => 'Fournir le Listing détaillé par catégorie d’âge et lieu d’habitation (format Excel ou pdf)',
                                        'type' => 'file']);
            echo $this->Form->control('user_id', [
                                        'type' => 'select']);


        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregister les informations')) ?>
    <?= $this->Form->end() ?>

</div>
