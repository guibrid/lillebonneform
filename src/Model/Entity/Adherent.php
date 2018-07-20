<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adherent Entity
 *
 * @property int $id
 * @property string $name
 * @property string $prenom
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $birthday
 * @property string $address
 * @property int $cp
 * @property string $ville
 * @property int $association_id
 *
 * @property \App\Model\Entity\Association $association
 */
class Adherent extends Entity
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
        'id' => false
    ];
}
