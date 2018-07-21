<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?php echo $this->element('sidebar'); ?>
</nav>
<div class="brevets form large-9 medium-8 columns content">
    <?= $this->Form->create($brevet, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Modifier brevet fédéral') ?></legend>
        <?php
            echo $this->Form->control('name', [
                                        'label' => 'Nom']);
            echo $this->Form->control('prenom', [
                                        'label' => 'Prénom']);
            $options = [$brevet->niveau => $brevet->niveau,
            'Brevet d\'état d\'éducateur sportif' => 'Brevet d\'état d\'éducateur sportif',
            'Brevet fédéral' => 'Brevet fédéral',
            'Autre' => 'Autre'];
            echo $this->Form->control('niveau', ['label'=>'Type de brevet', 'type'=>'select', 'options'=>$options]);
            if (empty($brevet->brevet_doc)) {
              echo $this->Form->control('brevet_doc', [
                                          'label' => 'Photocopie du brevet (format pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Brevet </b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le brevet',
                                      ['controller' => 'Brevets', 'action' => 'deletefile',
                                        "id" => $brevet->id,
                                        "file_type" => "brevet_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
