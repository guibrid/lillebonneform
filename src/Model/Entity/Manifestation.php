<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manifestation Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $description
 * @property string $budget_previ_doc
 * @property int $budget_previ_doc_dir
 * @property int $association_id
 *
 * @property \App\Model\Entity\Association $association
 */
class Manifestation extends Entity
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
        'budget_previ_doc' => true,
        'budget_previ_doc_dir' => true
    ];
}
