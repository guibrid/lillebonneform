<?php $session = $this->request->session(); ?>
<ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('Détails de l\'association'), ['controller' => 'Associations', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Membres de l\'asso'), ['controller' => 'Members', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Diplomes & brevets'), ['controller' => 'Diplomas', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Frais & cotisations'), ['controller' => 'Fees', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Compétiteurs'), ['controller' => 'athletes', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Equipes'), ['controller' => 'teams', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Adhérents'), ['controller' => 'adherents', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Manifestations pour 2018'), ['controller' => 'manifestations', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Niveau de jeu'), ['controller' => 'levels', 'action' => 'index', $session->read('association_id') ]) ?></li>
    <li><?= $this->Html->link(__('Demandes divers'), ['controller' => 'requests', 'action' => 'index']) ?></li>
</ul>
<hr />
<p>Une fois toutes vos informations enregistrées dans toutes les rubriques, cliquez sur le bouton ci-dessous pour valider l'ensemble. Attention une fois validé, vous ne pourrez plus modifier vos informations.</p>
<?= $this->Html->link(__('Valider & envoyer'), ['controller' => 'associations', 'action' => 'validate'],
                                               ['confirm' => 'Etes-vous sûr de vouloir valider?', 'class' => 'validateButton']) ?>
