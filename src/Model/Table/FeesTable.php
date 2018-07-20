<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fees Model
 *
 * @property \App\Model\Table\AssociationsTable|\Cake\ORM\Association\BelongsTo $Associations
 *
 * @method \App\Model\Entity\Fee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeesTable extends Table
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

        $this->setTable('fees');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Proffer.Proffer', [
          'proof_doc' => [	// The name of your upload field
            'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
            'dir' => 'proof_doc_dir',	// The name of the field to store the folder
          ]]);

        $this->belongsTo('Associations', [
            'foreignKey' => 'association_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('age_category');

        $validator
            ->allowEmpty('price');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('proof_doc');

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
