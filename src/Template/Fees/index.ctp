<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Fee[]|\Cake\Collection\CollectionInterface $fees
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?php echo $this->element('sidebar'); ?>
</nav>
<div class="fees index large-9 medium-8 columns content">
    <h3><?= __('Frais & cotisations') ?></h3>
    <p align="right"><b><?= $this->Html->link(__('Ajouter des frais ou cotisations'), ['controller' => 'fees', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('type', ['label' => 'Type de frais']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Description']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_category', ['label' => 'Catégories d\'ages']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('price', ['label' => 'Montants']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('proof_doc', ['label' => 'Justificatifs du montant']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fees as $fee): ?>
            <tr>
                <td><?= h($fee->type) ?></td>
                <td><?= h($fee->name) ?></td>
                <td><?= h($fee->age_category) ?></td>
                <td><?= h($fee->price) ?>€</td>
                <td><?= h($fee->proof_doc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $fee->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $fee->id], ['confirm' => __('Voulez-vous supprimer?', $fee->id)]) ?>
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
