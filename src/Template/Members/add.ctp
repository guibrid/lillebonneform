<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="members form large-9 medium-8 columns content">
    <?= $this->Form->create($member) ?>
    <fieldset>
        <legend><?= __('Ajouter un membre') ?></legend>
        <?php
            $session = $this->request->session();
            echo $this->Form->control('name', ['label' => 'Nom et prénom']);
            echo $this->Form->control('address', ['label' => 'Adresse']);
            echo $this->Form->control('telephone', ['label' => 'Téléphone']);
            echo $this->Form->control('email', ['label' => 'Email']);
            $options = ['' => '', 'Autre' => 'Autre',  'Président' => 'Président', 'Trésorier' => 'Trésorier', 'Secretaire' => 'Secretaire'];
            echo $this->Form->control('function', ['label'=>'Fonction dans l\'association', 'type'=>'select', 'options'=>$options]);
            echo $this->Form->control('association_id', ['type' => 'hidden',
                                                         'value' => $session->read('association_id')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
