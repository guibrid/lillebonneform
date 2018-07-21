<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Associations Model
 *
 * @property \App\Model\Table\DiplomasTable|\Cake\ORM\Association\HasMany $Diplomas
 * @property \App\Model\Table\FeesTable|\Cake\ORM\Association\HasMany $Fees
 * @property \App\Model\Table\MembersTable|\Cake\ORM\Association\HasMany $Members
 *
 * @method \App\Model\Entity\Association get($primaryKey, $options = [])
 * @method \App\Model\Entity\Association newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Association[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Association|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Association patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Association[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Association findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AssociationsTable extends Table
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

        $this->setTable('associations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // Add the behaviour and configure any options you want
        $this->addBehavior('Proffer.Proffer', [
        	'listing_licencies_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'listing_licencies_doc_dir',	// The name of the field to store the folder
        	],
          'calendrier_resultats_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'calendrier_resultats_doc_dir',	// The name of the field to store the folder
        	],
          'list_adherents_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'list_adherents_doc_dir',	// The name of the field to store the folder
        	],
          'compte_resultat_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'compte_resultat_doc_dir',	// The name of the field to store the folder
        	],
          'grand_livre_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'grand_livre_doc_dir',	// The name of the field to store the folder
        	],
          'budget_realise_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'budget_realise_doc_dir',	// The name of the field to store the folder
        	],
          'budget_previsionnel_doc' => [	// The name of your upload field
        		'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
        		'dir' => 'budget_previsionnel_doc_dir',	// The name of the field to store the folder
        	]
        ]);


        $this->hasMany('Diplomas', [
            'foreignKey' => 'association_id'
        ]);
        $this->hasMany('Brevets', [
            'foreignKey' => 'association_id'
        ]);
        $this->hasMany('Fees', [
            'foreignKey' => 'association_id'
        ]);
        $this->hasMany('Members', [
            'foreignKey' => 'association_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->requirePresence('name', 'create')
            ->allowEmpty('name');

        $validator
            ->integer('licence_moins15')
            ->allowEmpty('licence_moins15');

        $validator
            ->integer('licence_moins15Compet')
            ->allowEmpty('licence_moins15Compet');

        $validator
            ->integer('licence_plus15')
            ->allowEmpty('licence_plus15');


        $fields = ['listing_licencies_doc',
                   'calendrier_resultats_doc',
                   'list_adherents_doc',
                   'compte_resultat_doc',
                   'grand_livre_doc',
                   'budget_realise_doc',
                   'budget_previsionnel_doc'];
        foreach ($fields as $field) {
          $validator
              ->allowEmpty($field)
              ->add($field, [
                  'validExtension' => [
                      'rule' => ['extension',['pdf', 'xls', 'xlsx', 'xlsm']],
                      'message' => __('Le fichier que vous avez envoyé n\'est pas un pdf ou Excel')
                  ]
          ]);
        }


        return $validator;
    }
}
