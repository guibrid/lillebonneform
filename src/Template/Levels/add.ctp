<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rankings'), ['controller' => 'Rankings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ranking'), ['controller' => 'Rankings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="levels form large-9 medium-8 columns content">
    <?= $this->Form->create($level) ?>
    <fieldset>
        <legend><?= __('Add Level') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('categorie');
            echo $this->Form->control('ordre');
            echo $this->Form->control('ranking_id', ['options' => $rankings]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
