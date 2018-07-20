<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

  <?php echo $this->element('sidebar'); ?>

</nav>
<div class="associations form large-9 medium-8 columns content">
    <h2><?= h($association->name) ?></h2>
    <?= $this->Form->create($association, ['type' => 'file']) ?>
    <fieldset>
        <h4><?= __('Nombre de licenciés') ?></h4>
        <?php
            echo $this->Form->control('licence_moins15', [
                                        'label' => 'Moins de 15 ans (2001 et après)']);
            echo $this->Form->control('licence_moins15Compet', [
                                        'label' => 'Moins de 15 ans pratiquant la compétition'
                                    ]);
            echo $this->Form->control('licence_plus15', [
                                        'label' => 'Plus de 15 ans (2000 et avant)'
                                    ]);
            echo '<table>';
            echo '<tr><td>';
            if (empty($association->listing_licencies_doc)) {
              echo $this->Form->control('listing_licencies_doc', [
                                          'label' => 'Fournir le listing détaillé par catégorie d’âge et lieu d’habitation (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Listing des licenciés </b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le listing',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "listing_licencies_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
            echo '</td><td>';
            if (empty($association->calendrier_resultats_doc)) {
              echo $this->Form->control('calendrier_resultats_doc', [
                                          'label' => 'Fournir le calendrier et les résultats officiels des compétions (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Calendrier et les résultats officiels</b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le calendrier',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "calendrier_resultats_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);

            }
            echo '</td><td>';
            if (empty($association->list_adherents_doc)) {
              echo $this->Form->control('list_adherents_doc', [
                                          'label' => 'Fournir le listing des adhérents (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Listing des adhérents</b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le listing des adhérents',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "list_adherents_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
            echo '</td></tr></table>';
            echo '<h4>'. __('Nombre de licenciés').'</h4>';

            echo '<table><tr><td>';
            if (empty($association->compte_resultat_doc)) {
              echo $this->Form->control('compte_resultat_doc', [
                                          'label' => 'Compte de résultat de la saison écoulée ou de l\'année civile (en fonction de la clôture des comptes) (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Compte de résultat de la saison</b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le Compte de résultat',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "compte_resultat_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
            echo '</td><td>';
            if (empty($association->grand_livre_doc)) {
              echo $this->Form->control('grand_livre_doc', [
                                          'label' => 'Grand livre (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Grand livre</b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le Grand livre',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "grand_livre_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
            echo '</td><td>';
            if (empty($association->budget_realise_doc)) {
              echo $this->Form->control('budget_realise_doc', [
                                          'label' => 'Budget réalisé saison sportive (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Budget réalisé</b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le Budget réalisé',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "budget_realise_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
            echo '</td><td>';
            if (empty($association->budget_previsionnel_doc)) {
              echo $this->Form->control('budget_previsionnel_doc', [
                                          'label' => 'Budget prévisionnel saison sportive (format Excel ou pdf)',
                                          'type' => 'file']);
            } else {
              echo '<p><b>Budget prévisionnel</b><br />'.$this->Html->image('icon_pdf_upload.gif', ['alt' => 'Votre fichier est en ligne']).'</p>';
              echo $this->Html->link('Supprimer le Budget prévisionnel',
                                      ['controller' => 'Associations', 'action' => 'deletefile',
                                        "id" => $association->id,
                                        "file_type" => "budget_previsionnel_doc",],
                                      ['confirm' => 'êtes-vous sur de vouloir supprimer le fichier?']);
            }
            echo '</td></tr></table>';
            /*echo $this->Form->control('user_id', [
                                        'type' => 'hidden',
                                        'value' => $this->request->session()->read('Auth.User.id')]);*/
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer les modifications'), ['id' => 'btnAsso']) ?>
    <?= $this->Form->end() ?>
</div>
