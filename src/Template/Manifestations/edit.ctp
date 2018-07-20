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
                                          'label' => 'Budget prévisionnel (format pdf)  (Obligatoire si demande de subvention)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Budget prévisionnel </b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le Budget prévisionnel',
                                      ['controller' => 'Manifestations', 'action' => 'deletefile',
                                        "id" => $manifestation->id,
                                        "file_type" => "budget_previ_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
