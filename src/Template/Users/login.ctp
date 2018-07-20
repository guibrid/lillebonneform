<!-- src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></legend>
        <?= $this->Form->control('username', ['label' => 'Identifiant']) ?>
        <?= $this->Form->control('password', ['label' => 'Mot de passe']) ?>
        <?= $this->Form->button(__('Se Connecter')); ?>
    </fieldset>

<?= $this->Form->end() ?>
</div>
