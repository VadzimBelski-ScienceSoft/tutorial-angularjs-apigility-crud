<?php

/**
 * ClienteForm
 * @file ClienteForm.php
 * @date 07/02/2015
 * @author Fábio Paiva <paiva.fabiofelipe@gmail.com>
 * @project tutorial-angularjs-apigility-crud
 */
namespace Application\Form;
use Zend\Form\Form;

class ClienteForm extends Form {
    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);
        
        $this
                ->setAttribute('class', 'form-horizontal')
                ->add(array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'attributes' => array(
                        'data-ng-value' => 'form.id'
                    )
                ))
                ->add(array(
                    'type' => 'text',
                    'name' => 'nome',
                    'attributes' => array(
                        'class' => 'form-control input-sm',
                        'data-ng-model' => 'form.nome'
                    ),
                    'options' => array(
                        'label' => 'Nome'
                    )
                ))
                ->add(array(
                    'type' => 'text',
                    'name' => 'sobrenome',
                    'attributes' => array(
                        'class' => 'form-control input-sm',
                        'data-ng-model' => 'form.sobrenome'
                    ),
                    'options' => array(
                        'label' => 'Sobrenome'
                    )
                ))
                ;
    }
}
