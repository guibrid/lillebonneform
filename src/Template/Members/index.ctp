<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Member[]|\Cake\Collection\CollectionInterface $members
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="members index large-9 medium-8 columns content">
    <h3><?= __('Membres') ?></h3>
    <p align="right"><b><?= $this->Html->link(__('Ajouter un nouveau membres'), ['controller' => 'Members', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nom & prénom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('function', 'Fonction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address', 'Adresse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone', 'Téléphone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= h($member->name) ?></td>
                <td><?= h($member->function) ?></td>
                <td><?= h($member->address) ?></td>
                <td><?= h($member->telephone) ?></td>
                <td><?= h($member->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $member->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $member->id], ['confirm' => __('Etes vous sur de vouloir supprimer?', $member->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
        </ul>
    </div>
</div>
