<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fee Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $age_category
 * @property string $price
 * @property string $type
 * @property string $proof_doc
 * @property int $association_id
 *
 * @property \App\Model\Entity\Association $association
 */
class Fee extends Entity
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
        'proof_doc' => true,
        'proof_doc_dir' => true
    ];
}
