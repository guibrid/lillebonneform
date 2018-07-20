<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Manifestation[]|\Cake\Collection\CollectionInterface $manifestations
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="manifestations index large-9 medium-8 columns content">
    <h3><?= __('Manifestations prévues pour 2019') ?></h3>
    <h5><?= __('Rappel: le solde de la subvention sera versé après réception des budgets réalisés') ?></h5>
    <p align="right"><b><?= $this->Html->link(__('Ajouter une manifestation'), ['controller' => 'manifestations', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nom de la manifestation']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('budget_previ_doc', ['label' => 'Budget prévisionnel (Obligatoire si demande de subvention)']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($manifestations as $manifestation): ?>
            <tr>
                <td><?= h($manifestation->name) ?></td>
                <td><?= h($manifestation->budget_previ_doc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manifestation->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $manifestation->id], ['confirm' => __('Voulez-vous supprimer?', $manifestation->id)]) ?>
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
