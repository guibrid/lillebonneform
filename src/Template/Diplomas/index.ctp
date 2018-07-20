<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Diploma[]|\Cake\Collection\CollectionInterface $diplomas
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="diplomas index large-9 medium-8 columns content">
    <h3><?= __('Diplômes & brevets') ?></h3>
    <p align="right"><b><?= $this->Html->link(__('Ajouter un brevet'), ['controller' => 'diplomas', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom', ['label' => 'Prénom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('number', ['label' => 'N° de diplôme']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('date', ['label' => 'Date d\'obtention']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('type', ['label' => 'Type']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('diploma_doc', ['label' => 'Diplôme PDF']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('carte_pro_doc', ['label' => 'Carte Pro PDF']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('contrat_doc', ['label' => 'Contrat PDF']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('planning_doc', ['label' => 'Planning PDF']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diplomas as $diploma): ?>
            <tr>
                <td><?= h($diploma->name) ?></td>
                <td><?= h($diploma->prenom) ?></td>
                <td><?= h($diploma->number) ?></td>
                <td><?= substr($diploma->date, 0, -5) ?></td>
                <td><?= h($diploma->type) ?></td>
                <td><?= h($diploma->diploma_doc) ?></td>
                <td><?= h($diploma->carte_pro_doc) ?></td>
                <td><?= h($diploma->contrat_doc) ?></td>
                <td><?= h($diploma->planning_doc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $diploma->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $diploma->id], ['confirm' => __('Voulez-vous supprimer?', $diploma->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suiviant') . ' >') ?>
        </ul>
    </div>
</div>
