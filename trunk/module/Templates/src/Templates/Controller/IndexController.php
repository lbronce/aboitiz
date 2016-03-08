<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Templates\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Config\Config;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
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
    
    public function _checkAccess(){
        $container = new Container('access');
        if($container->offsetExists('user_profile')){
            return true;
        } else {
            return false;
        }
    }
    
    public function indexAction()
    {
        return new ViewModel(array());
    }
    
    public function editAction(){
        $entityService = $this->getServiceLocator()->get('TemplateService');
        
        $data = $entityService->getById($this->params()->fromRoute('id'));
        //echo '<pre>';
        //print_r($entityService->getTemplateFieldsByFormTemplateId($data['formTemplateId']));
        //echo '</pre>';
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            // echo '<pre>'; print_r($request->getPost());echo'</pre>';exit();
            foreach($request->getPost() as $postIndex => $postValue){
                if(is_array($postValue)){
                    $this->parsePost($postValue, $postIndex, $data['formTemplateId']);
                }
            }
            // echo '<pre>'; print_r($this->templateFieldsData);echo'</pre>';exit();
            
            $entityService->clearExistingFieldsByFormTemplateId($data['formTemplateId']);
            foreach($this->templateFieldsData as $tfDataValue){
                $entityService->persistFtf($tfDataValue);
            }

            // Redirect to list of main
            // return $this->redirect()->toRoute('templates');
        }
        
        // print_r($this->templateFieldsData);
        
        return new ViewModel(array(
            'template'          => $data,
            'template_fields'   => $entityService->getTemplateFieldsByFormTemplateId($data['formTemplateId']),
            'field_types'       => $entityService->getFieldTypes(),
            'services'          => $entityService->getServices()
        ));
    }
    
    public function parsePost($postValue = array(), $postIndex = null, $formTemplateId = null){
        foreach($postValue as $pvIndex => $pvValue){
            $this->templateFieldsData[$pvIndex][$postIndex] = $pvValue;
            $this->templateFieldsData[$pvIndex]['ftfFormTemplateId'] = $formTemplateId;
        }
        
        return $this->templateFieldsData;
    }

    public function jsonGetListAction(){
        
        /** @var $entityService \my\Service\EntitynameService */
        $entityService = $this->getServiceLocator()->get('DatatablesService');
        
        // $data = new JsonModel($jsonp:$entityService->datatables()));
        
        $data = $entityService->datatables2(array(
            "stored_proc" => "TEMPLATES_SELECT",
            "params"      => array("'" . $this->params()->fromQuery('search')['value'] . "'")
        ));
        
        echo $data; exit();
    }
}
