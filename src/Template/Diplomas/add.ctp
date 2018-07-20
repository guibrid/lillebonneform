<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="diplomas form large-9 medium-8 columns content">
    <?= $this->Form->create($diploma, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Ajouter un brevet') ?></legend>
        <?php
            $session = $this->request->session();
            $options = ['' => '', 'Brevet d\'état d\'éducateur sportif' => 'Brevet d\'état d\'éducateur sportif', 'Brevet fédéral' => 'Brevet fédéral'];
            echo $this->Form->control('type', ['label'=>'Type de brevet', 'type'=>'select', 'options'=>$options]);
            echo $this->Form->control('name', ['label' => 'Nom']);
            echo $this->Form->control('prenom', ['label' => 'Prénom']);
            echo $this->Form->control('number', ['label' => 'Numéro du brevet']);
            $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']);
            echo $this->Form->control('date', ['label' => 'Date d\'obtention',
                                                'monthNames' => false,
                                                'empty'  => [
                                                      'year' => 'Choisissez l\'année...',
                                                      'month' => 'Choisissez le mois...',
                                                      'day' => 'Choisissez le jour...',
                                                      'hour' => false,
                                                      'minute' => false,
                                                    ],
                                                'minYear' => date('Y') - 100,
                                                'maxYear' => 2017,
                                                 ]);
            echo $this->Form->control('association_id', ['type' => 'hidden',
                                                         'value' => $session->read('association_id')]);
           echo $this->Form->control('diploma_doc', [
                                       'label' => 'Photocopie du brevet (format pdf)',
                                       'type' => 'file']);
           echo $this->Form->control('carte_pro_doc', [
                                       'label' => 'Photocopie de la carte professionnelle BEES uniquement (format pdf)',
                                       'type' => 'file']);
           echo $this->Form->control('contrat_doc', [
                                       'label' => 'Photocopie du contrat de travail (format pdf)',
                                       'type' => 'file']);
           echo $this->Form->control('planning_doc', [
                                       'label' => 'Planning d\'intervention (format pdf)',
                                       'type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
