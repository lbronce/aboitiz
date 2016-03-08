<?php
 // Filename: /module/Application/src/Application/ServiceFactory/UserServiceInterface.php
namespace Templates\ServiceFactory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Templates\Service\FieldTypesService;

class FieldTypesServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new FieldTypesService();
        $service->setEntityManager($serviceLocator->get('Doctrine\ORM\EntityManager'));
        return $service;
    }
}