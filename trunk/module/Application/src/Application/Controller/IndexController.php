<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    protected $em;
    
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function indexAction()
    {
        /*
         * $apiService = $this->getServiceLocator()->get('Application\Service\ApiService');
         *
        
        return new ViewModel(array(
            // 'data' => $this->getEntityManager()->getRepository('Application\Service\UserService')->findAll()
            'data' => $apiService->isValid($this->params('api-key'))
        ));
         * 
         */
        
        
        /** @var $entityService \my\Service\EntitynameService */
        $entityService = $this->getServiceLocator()->get('UserService');

        // A query that finds all stuff
        $allEntities = $entityService->findAll();

        // A query that finds an ID 
        $idEntity = $entityService->find(1);

        // A query that finds entities based on a Query
        $queryEntity = $entityService->findByQuery(function($queryBuilder){
            /** @var $queryBuilder\Doctrine\DBAL\Query\QueryBuilder */
            return $queryBuilder; 
        });
        
        $list = $entityService->getList();
        
        
        return new ViewModel(array(
            // 'data' => $this->getEntityManager()->getRepository('Application\Service\UserService')->findAll()
            'data' => (array)$list
        ));
        
    }
    
    public function jsonAction(){
        $sm = $this->getServiceLocator();
        // Models
	$this->UserTable = $sm->get('UserService');
        
        $server = new \Zend\Json\Server\Server();
        
        $server->setClass($this->getServiceLocator()->get('UserService'), 'User.Users');
        
        
        if ('GET' == $_SERVER['REQUEST_METHOD'] || 'POST' == $_SERVER['REQUEST_METHOD']) {
            // Indicate the URL endpoint, and the JSON-RPC version used:
            $server->setTarget('/application/json')
                       ->setEnvelope(\Zend\Json\Server\Smd::ENV_JSONRPC_2);

            // Grab the SMD
            $smd = $server->getServiceMap();

            // Return the SMD to the client
            header('Content-Type: application/json');

            if(isset($_REQUEST['aboitizSmdApi'])){
                    echo 'aboitizSmdApi = ' . $smd . ';';
            } else {
                $req = $server->getRequest()->getMethod();

                if($req){
                    $req_arr = explode('.', $req);
                    
                    echo json_encode(
                        array(
                            'result' => $this->{$req_arr[1]}->{$req_arr[2]}(((count($server->getRequest()->getParams()) > 0) ? $server->getRequest()->getParams()[0] : array())),
                            'id' => $server->getRequest()->getId()
                        )
                    );

                } else {

                    $po = $this->getRequest()->getPost()->toArray();

                    if(!empty($po)){
                        $po = (!empty($po)) ? $po : $_REQUEST;
                        
                        $params = $po;
                        foreach($params as $i => $v){
                            if(!strstr($i, 'ext') && ($i !== 'id')){

                            } else {
                                    UNSET($params[$i]);
                            }
                        }

                        $server->getRequest()->setParams($params);
                        $server->getRequest()->setMethod($po['extMethod']);
                        $req = $server->getRequest()->getMethod();

                        $server->getRequest()->setId(rand(1, 10));
                        $req_arr = explode('.', $req);

                        $server->getResponse()->setId($server->getRequest()->getId());
                        
                        echo json_encode(
                            array(
                                'result' => $this->{$req_arr[1]}->{$req_arr[2]}(((count($server->getRequest()->getParams()) > 0) ? $params : array())),
                                'id' => $server->getRequest()->getId()
                            )
                        );

                    } else {
                        echo $smd;
                    }
                }
            }
        }
        
        return $this->response;
    }
    
    public function testAction(){
        return new JsonModel(array(
            'test'  => 'hehe'
        ));
    }
}
