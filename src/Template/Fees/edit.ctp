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
        <legend><?= __('Modifier les frais') ?></legend>
        <?php
            $options = ['' => '',
            'Montant affiliation' => 'Montant affiliation',
            'Engagement' => 'Engagement',
            'Licence fédérale' => 'Licence fédérale',
            'Cotisation du club' => 'Cotisation du club',
            'Frais d\'engagement-arbitrage' => 'Frais d\'engagement-arbitrage' ];
            echo $this->Form->control('type', ['label'=>'Type de frais', 'type'=>'select', 'options'=>$options]);
            echo $this->Form->control('name', ['label'=>'Description']);
            echo $this->Form->control('age_category', ['label'=>'Catégorie d\'age']);
            echo $this->Form->control('price', ['label'=>'Montant']);
            if (empty($fee->proof_doc)) {
              echo $this->Form->control('proof_doc', [
                                          'label' => 'Justification du montant (format pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Justification du montant </b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le Justification du montant',
                                      ['controller' => 'Fees', 'action' => 'deletefile',
                                        "id" => $fee->id,
                                        "file_type" => "proof_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
