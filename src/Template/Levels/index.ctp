<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Level[]|\Cake\Collection\CollectionInterface $levels
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
      <?php echo $this->element('sidebar'); ?>
</nav>
<div class="levels index large-9 medium-8 columns content">
    <h3><?= __('Niveau de jeu') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('categorie', ['label' => 'Catégorie']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label' => 'Classement fédéral']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('value', ['label' => 'Nombre de compétiteurs']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($levels as $level): ?>
            <tr>
                <td><?= h($level->categorie) ?></td>
                <td><?= h($level->name) ?></td>
                <td><?= h($level->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $level->id]) ?>
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
