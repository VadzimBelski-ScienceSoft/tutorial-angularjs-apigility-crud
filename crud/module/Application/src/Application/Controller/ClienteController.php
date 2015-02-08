<?php
/**
 * ClienteController
 * @file ClienteController.php
 * @date 07/02/2015
 * @author Fábio Paiva <paiva.fabiofelipe@gmail.com>
 * @project tutorial-angularjs-apigility-crud
 */
namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Form\ClienteForm;

class ClienteController extends AbstractActionController {
    public function indexAction() {
        
    }
    public function adicionarAction() {
        $form = new ClienteForm();
        return array(
            'form' => $form,
            'id' => $this->params()->fromRoute('id')
        );
    }
    
    public function editarAction() {
        return $this->forward()->dispatch('Application\Controller\Cliente',array(
            'action' => 'adicionar',
            'id' => $this->params()->fromRoute('id')
        ));
    }
}
