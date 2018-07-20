<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ranking->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ranking->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rankings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Associations'), ['controller' => 'Associations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Association'), ['controller' => 'Associations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rankings form large-9 medium-8 columns content">
    <?= $this->Form->create($ranking) ?>
    <fieldset>
        <legend><?= __('Edit Ranking') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('association_id', ['options' => $associations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
