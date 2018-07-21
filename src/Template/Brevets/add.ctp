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
        <legend><?= __('Ajouter un Brevet fédéral') ?></legend>
        <?php
        $session = $this->request->session();
        $options = ['' => '',
        'Brevet d\'état d\'éducateur sportif' => 'Brevet d\'état d\'éducateur sportif',
        'Brevet fédéral' => 'Brevet fédéral',
        'Autre' => 'Autre'];
            echo $this->Form->control('name', ['label' => 'Nom']);
            echo $this->Form->control('prenom', ['label' => 'Prénom']);
            echo $this->Form->control('niveau', ['label'=>'Niveau du brevet', 'type'=>'select', 'options'=>$options]);
            echo $this->Form->control('brevet_doc', [
                                        'label' => 'Photocopie du brevet (format pdf)',
                                        'type' => 'file']);
            echo $this->Form->control('association_id', ['type' => 'hidden',
                                                         'value' => $session->read('association_id')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
