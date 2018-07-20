<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Association Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $licence_moins15
 * @property int $licence_moins15Compet
 * @property int $licence_plus15
 * @property string $licence_doc
 *
 * @property \App\Model\Entity\Diploma[] $diplomas
 * @property \App\Model\Entity\Fee[] $fees
 * @property \App\Model\Entity\Member[] $members
 */
class Association extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'listing_licencies_doc'=>true,
        'listing_licencies_doc_dir'=>true,
        'calendrier_resultats_doc'=>true,
        'calendrier_resultats_doc_dir'=>true,
        'list_adherents_doc'=>true,
        'list_adherents_doc_dir'=>true,
        'compte_resultat_doc'=>true,
        'compte_resultat_doc_dir'=>true,
        'grand_livre_doc'=>true,
        'grand_livre_doc_dir'=>true,
        'budget_realise_doc'=>true,
        'budget_realise_doc_dir'=>true,
        'budget_previsionnel_doc'=>true,
        'budget_previsionnel_doc_dir'=>true
    ];
}
