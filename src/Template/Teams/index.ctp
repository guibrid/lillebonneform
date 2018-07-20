<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Team[]|\Cake\Collection\CollectionInterface $teams
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="teams index large-9 medium-8 columns content">
    <h3><?= __('Equipes') ?></h3>
    <h5><?= __('Le service des sports calculera le temps par sportif') ?></h5>
    <p align="right"><b><?= $this->Html->link(__('Ajouter une équipe'), ['controller' => 'teams', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nom de l\'équipe']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbr_playeur', ['label' => 'Nbr de compétiteurs de l\'équipe']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbr_match', ['label' => 'Nbr de matches officiels annuels']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbr_km', ['label' => 'Nbr Km annuels de l\'équipe (Aller/retour uniquement un trajet)']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team): ?>
            <tr>
                <td><?= h($team->name) ?></td>
                <td><?= $this->Number->format($team->nbr_playeur) ?></td>
                <td><?= $this->Number->format($team->nbr_match) ?></td>
                <td><?= $this->Number->format($team->nbr_km) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $team->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $team->id], ['confirm' => __('Voulez-vous supprimer?', $team->id)]) ?>
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
