<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Brevet[]|\Cake\Collection\CollectionInterface $brevets
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
      <?php echo $this->element('sidebar'); ?>
</nav>
<div class="brevets index large-9 medium-8 columns content">
    <h3><?= __('Brevets fédéraux') ?></h3>
      <p align="right"><b><?= $this->Html->link(__('Ajouter un brevet'), ['controller' => 'Brevets', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom', ['label' => 'Prénom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('niveau') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brevet_doc', ['label' => 'Brevet PDF']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brevets as $brevet): ?>
            <tr>
                <td><?= h($brevet->name) ?></td>
                <td><?= h($brevet->prenom) ?></td>
                <td><?= h($brevet->niveau) ?></td>
                <td><?= h($brevet->brevet_doc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $brevet->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $brevet->id], ['confirm' => __('Etes-vous sur de supprimer?', $brevet->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Premier')) ?>
            <?= $this->Paginator->prev('< ' . __('Précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
            <?= $this->Paginator->last(__('Dernier') . ' >>') ?>
        </ul>
    </div>
</div>
