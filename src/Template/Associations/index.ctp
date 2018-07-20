<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Association[]|\Cake\Collection\CollectionInterface $associations
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="associations index large-9 medium-8 columns content">

    <?php foreach ($associations as $association): ?>
<?php if($association->validation == 1) { ?>
  <div class="associations index large-12 medium-12 columns content">
    <p align="center"><?php echo $this->Html->image('ok-xxl.png', ['alt' => 'Validation ok', 'width' => '200px', 'height' => '200px']); ?></p>
    <h5 align="center">Validation effectuée</h5>
    <p align="center">Vos éléments ont été transmis au service des sports.</p>


  </div>


<?php } ?>
        <h3><?= h($association->name) ?></h3>
        <p align="right"><b><?= $this->Html->link(__('Modifier les informations'), ['controller' => 'Associations', 'action' => 'edit', $association->id]) ?></b></p>
        <h4><?= __('Nombre de licenciés') ?></h4>
        <table>
        <tr><td>Moins de 15 ans (2001 et après) :</td><td> <?= h($association->licence_moins15) ?></td></tr>
        <tr><td>Moins de 15 ans pratiquant la compétition :</td><td> <?= h($association->licence_moins15Compet) ?></td></tr>
        <tr><td>Plus de 15 ans (2000 et avant) :</td><td> <?= h($association->licence_plus15) ?></td></tr>
        <tr><td>Listing détaillé par catégorie d'âge et lieu d'habitation :</td><td> <?= h($association->listing_licencies_doc) ?></td></tr>
        <tr><td>Calendrier et résultats officiels des compétions  :</td><td> <?= h($association->calendrier_resultats_doc) ?></td></tr>
        <tr><td>Listing des adhérents  :</td><td> <?= h($association->list_adherents_doc) ?></td></tr></table>
        <h4><?= __('Finances') ?></h4>
        <table><tr><td>Compte de résultat de la saison écoulée  :</td><td> <?= h($association->compte_resultat_doc) ?></td></tr>
        <tr><td>Grand livre 2016  :</td><td> <?= h($association->grand_livre_doc) ?></td></tr>
        <tr><td>Budget réalisé saison sportive  :</td><td> <?= h($association->budget_realise_doc) ?></td></tr>
        <tr><td>Budget prévisionnel saison sportive  :</td><td> <?= h($association->budget_previsionnel_doc) ?></td></tr>
      </table>
    <?php endforeach; ?>

</div>
