<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="manifestations form large-9 medium-8 columns content">
    <?= $this->Form->create($manifestation, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Modifier la manifestation') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nom de la manifestation']);
            echo $this->Form->control('description', ['label' => 'Description de la manifestation']);
            if (empty($manifestation->budget_previ_doc)) {
              echo $this->Form->control('budget_previ_doc', [
                                          'label' => 'Budget prévisionnel (format pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Budget prévisionnel </b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>