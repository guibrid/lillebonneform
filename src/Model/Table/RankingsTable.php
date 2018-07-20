<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rankings Model
 *
 * @property \App\Model\Table\AssociationsTable|\Cake\ORM\Association\BelongsTo $Associations
 * @property \App\Model\Table\LevelsTable|\Cake\ORM\Association\HasMany $Levels
 *
 * @method \App\Model\Entity\Ranking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ranking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ranking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ranking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ranking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ranking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ranking findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RankingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('rankings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Associations', [
            'foreignKey' => 'association_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Levels', [
            'foreignKey' => 'ranking_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['association_id'], 'Associations'));

        return $rules;
    }
}
