<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Templates\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\View\Model\ViewModel;
use Zend\Config\Config;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Zend\View\Model\JsonModel;

class FieldTypesController extends AbstractActionController
{
    protected $em;
    protected $provider;
    private   $templateFieldsData = array();
    
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function indexAction() {
        return new ViewModel();
    }
    
    public function addAction(){
        $entityService = $this->getServiceLocator()->get('FieldTypesService');
        
        $data = $entityService->getById($this->params()->fromRoute('id'));
        $request = $this->getRequest();
        $validationErrors = array();
        
        if ($request->isPost()) {
            // Validate Form
            $validatorService = $this->getServiceLocator()->get('ValidatorService');
            $validatorService->validate("fieldTypeName", "Name", $request->getPost("fieldTypeName"), "Alnum");
            
            if($validatorService->isValid()){
                
                // ... Save Data ...
                 $entityService->add($request->getPost());
                $this->flashMessenger()->addMessage("{$request->getPost('fieldTypeName')} has been successfully added.");
                
                // Redirect to list of main
                $this->redirect()->toUrl('/templates/field_types');
            } else {
                $validationErrors = $validatorService->getValidationErrors();
            }
            
        }
        
        return new ViewModel(array(
            'template'          => $data,
            'validation_errors' => $validationErrors,
            'post'              => $request->getPost()
        ));
    }
    
    public function editAction(){
        $entityService = $this->getServiceLocator()->get('FieldTypesService');
        
        $data = $entityService->getById($this->params()->fromRoute('id'));
        $request = $this->getRequest();
        $validationErrors = array();
        
        if ($request->isPost()) {
            // Validate Form
            $validatorService = $this->getServiceLocator()->get('ValidatorService');
            $validatorService->validate("fieldTypeName", "Name", $request->getPost("fieldTypeName"), "Alnum");
            
            if($validatorService->isValid()){
                
                // echo '<pre>'; print_r($request->getPost()); echo '</pre>'; exit();
                // ... Save Data ...
                $entityService->update($request->getPost());
                $this->flashMessenger()->addMessage("{$request->getPost('fieldTypeName')} has been successfully updated.");
                
                // Redirect to list of main
                $this->redirect()->toUrl('/templates/field_types');
            } else {
                $validationErrors = $validatorService->getValidationErrors();
            }
            
        }
        
        return new ViewModel(array(
            'template'          => $data,
            'validation_errors' => $validationErrors,
            'post'              => $request->getPost()
        ));
    }

    public function jsonGetListAction(){
        
        /** @var $entityService \my\Service\EntitynameService */
        $entityService = $this->getServiceLocator()->get('DatatablesService');
        
        // $data = new JsonModel($jsonp:$entityService->datatables()));
        
        $data = $entityService->datatables2(array(
            "stored_proc" => "FIELD_TYPES_SELECT",
            "params"      => array("'" . $this->params()->fromQuery('search')['value'] . "'")
        ));
        
        echo $data; exit();
    }
}

