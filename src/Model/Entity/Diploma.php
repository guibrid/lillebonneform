<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diploma Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $prenom
 * @property string $number
 * @property \Cake\I18n\FrozenTime $date
 * @property string $type
 * @property int $association_id
 * @property string $diploma_doc
 * @property string $carte_pro_doc
 * @property string $contrat_doc
 * @property string $planning_doc
 *
 * @property \App\Model\Entity\Association $association
 */
class Diploma extends Entity
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
        'diploma_doc'=>true,
        'diploma_doc_dir'=>true,
        'carte_pro_doc'=>true,
        'carte_pro_doc_dir'=>true,
        'contrat_doc'=>true,
        'contrat_doc_dir'=>true,
        'planning_doc'=>true,
        'planning_doc_dir'=>true
    ];
}
