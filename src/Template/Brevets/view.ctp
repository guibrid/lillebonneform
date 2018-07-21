<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Brevet $brevet
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Brevet'), ['action' => 'edit', $brevet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Brevet'), ['action' => 'delete', $brevet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brevet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Brevets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brevet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Associations'), ['controller' => 'Associations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Association'), ['controller' => 'Associations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="brevets view large-9 medium-8 columns content">
    <h3><?= h($brevet->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($brevet->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($brevet->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Niveau') ?></th>
            <td><?= h($brevet->niveau) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brevet Doc') ?></th>
            <td><?= h($brevet->brevet_doc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brevet Doc Dir') ?></th>
            <td><?= h($brevet->brevet_doc_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Association') ?></th>
            <td><?= $brevet->has('association') ? $this->Html->link($brevet->association->name, ['controller' => 'Associations', 'action' => 'view', $brevet->association->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($brevet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($brevet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($brevet->updated) ?></td>
        </tr>
    </table>
</div>
