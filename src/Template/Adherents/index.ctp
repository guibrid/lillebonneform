<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Adherent[]|\Cake\Collection\CollectionInterface $adherents
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="adherents index large-9 medium-8 columns content">
    <h3><?= __('Adhérents') ?></h3>
    <p align="right"><b><?= $this->Html->link(__('Ajouter un adhérent'), ['controller' => 'adherents', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom', ['label' => 'Prénom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday', ['label' => 'Date de naissance']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('address', ['label' => 'Adresse']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('cp', ['label' => 'Code postal']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('ville', ['label' => 'Ville']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adherents as $adherent): ?>
            <tr>
                <td><?= h($adherent->name) ?></td>
                <td><?= h($adherent->prenom) ?></td>
                <td><?= substr($adherent->birthday, 0, -5) ?></td>
                <td><?= h($adherent->address) ?></td>
                <td><?= $this->Number->format($adherent->cp) ?></td>
                <td><?= h($adherent->ville) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $adherent->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $adherent->id], ['confirm' => __('Voulez-vous supprimer?', $adherent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
    </div>
</div>
