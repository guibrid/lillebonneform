<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?php echo $this->element('sidebar'); ?>
</nav>
<div class="requests index large-9 medium-8 columns content">
    <h3><?= __('Demandes diverses') ?></h3>
    <p align="right"><b><?= $this->Html->link(__('Ajouter une demande'), ['controller' => 'requests', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Titre de la demande']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('budget_previ_doc', ['lable' => 'Budget prévisionnel']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= h($request->name) ?></td>
                <td><?= h($request->budget_previ_doc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $request->id], ['confirm' => __('Voulez-vous supprimer?', $request->id)]) ?>
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
