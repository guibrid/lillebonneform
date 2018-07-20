<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="adherents form large-9 medium-8 columns content">
    <?= $this->Form->create($adherent) ?>
    <fieldset>
        <legend><?= __('Modifier un adhérent') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nom']);
            echo $this->Form->control('prenom', ['label' => 'Prénom']);
            $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']);
            echo $this->Form->control('birthday', ['label' => 'Date de naissance',
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
            echo $this->Form->control('address', ['label' => 'Adresse']);
            echo $this->Form->control('cp', ['label' => 'Code postal']);
            echo $this->Form->control('ville', ['label' => 'Ville']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregister')) ?>
    <?= $this->Form->end() ?>
</div>
