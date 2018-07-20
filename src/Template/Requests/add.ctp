<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?php echo $this->element('sidebar'); ?>
</nav>
<div class="requests form large-9 medium-8 columns content">
    <?= $this->Form->create($request, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Ajouter une demande') ?></legend>
        <?php
            $session = $this->request->session();
            echo $this->Form->control('name', ['label' => 'Titre de votre demande']);
            echo $this->Form->control('description', ['label' => 'Description de votre demande']);
            echo $this->Form->control('budget_previ_doc', [
                                        'label' => 'Budget prévisionnel (format pdf)',
                                        'type' => 'file']);
            echo $this->Form->control('association_id', ['type' => 'hidden',
                                                         'value' => $session->read('association_id')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
