<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DataTable extends Table
{
    public function initialize(array $config)
    {
        // permet de renseigner les dates de la table
        $this->addBehavior('Timestamp');
        // lien avec la table dataElement
        $this->hasMany('DataElement');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            //empeche de saisir une data avec le nom non renseigné
            ->notEmpty('name');


        return $validator;
    }
}