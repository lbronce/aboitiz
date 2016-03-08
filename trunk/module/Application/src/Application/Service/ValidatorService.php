<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Application\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;


class ValidatorService implements ServiceManagerAwareInterface, EventManagerAwareInterface{
    
    protected $eventManager;
    
    protected $_Alnum = null;
    public $_validationErrors = array();
    
    function __construct() {
        $this->_Alnum = new \Zend\I18n\Validator\Alnum(array('allowWhiteSpace' => true));
    }
    
    public function validate($fieldName = null, $fieldLabel = null, $value, $type = null){
        switch($type){
            case "Alnum":
                if ($this->_Alnum->isValid($value)) {
                    return true;
                } else {
                    $this->_validationErrors[$fieldName] = $fieldLabel . " does not contain Alphanumeric value."; 
                }
                break;
            default:
                return false;
        }
    }
    
    public function getValidationErrors(){
        return $this->_validationErrors;
    }
    
    public function isValid(){
        return empty($this->_validationErrors) ? true : false;
    }
    
    /**
     * Inject an EventManager instance
     *
     * @param  EventManagerInterface $eventManager
     * @return \Haushaltportal\Service\DoctrineEntityService
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
        return $this;
    }

    /**
     * Retrieve the event manager
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * Set service manager
     *
     * @param ServiceManager $serviceManager
     * @return \Haushaltportal\Service\DoctrineEntityService
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    /**
     * Get service manager
     *
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
    
    
}
