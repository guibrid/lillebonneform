<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Athlete[]|\Cake\Collection\CollectionInterface $athletes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <?php echo $this->element('sidebar'); ?>
</nav>
<div class="athletes index large-9 medium-8 columns content">
    <h3><?= __('Compétiteurs') ?></h3>
    <p align="right"><b><?= $this->Html->link(__('Ajouter un compétiteur'), ['controller' => 'athletes', 'action' => 'add']) ?></b></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Nom & prénom']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbr_match', ['label' => 'Nombre de compétitions officielles']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nbr_km', ['label' => 'Nombre de Km annuels']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($athletes as $athlete): ?>
            <tr>
                <td><?= h($athlete->name) ?></td>
                <td><?= $this->Number->format($athlete->nbr_match) ?></td>
                <td><?= $this->Number->format($athlete->nbr_km) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $athlete->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $athlete->id], ['confirm' => __('Voulez-vous supprimer?', $athlete->id)]) ?>
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
