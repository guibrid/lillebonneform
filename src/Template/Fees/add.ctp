<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?php echo $this->element('sidebar'); ?>
</nav>
<div class="fees form large-9 medium-8 columns content">
    <?= $this->Form->create($fee, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Ajouter des frais') ?></legend>
        <?php
            $session = $this->request->session();
            $options = ['' => '',
                        'Licence fédérale' => 'Licence fédérale',
                        'Cotisation du club' => 'Cotisation du club',
                        'Frais d\'engagement-arbitrage' => 'Frais d\'engagement-arbitrage' ];
            echo $this->Form->control('type', ['label'=>'Type de frais', 'type'=>'select', 'options'=>$options]);
            echo $this->Form->control('name', ['label'=>'Description']);
            echo $this->Form->control('age_category', ['label'=>'Catégorie d\'age']);
            echo $this->Form->control('price', ['label'=>'Montant']);
            echo $this->Form->control('association_id', ['type' => 'hidden',
                                                         'value' => $session->read('association_id')]);
            echo $this->Form->control('proof_doc', [
                                        'label' => 'Justification du montant (format pdf)',
                                        'type' => 'file']);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrement'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
