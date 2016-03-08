<?php
 // Filename: /module/Application/src/Application/ServiceFactory/UserServiceInterface.php
namespace Templates\ServiceFactory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Templates\Service\EmailTemplateService;

class EmailTemplateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new EmailTemplateService();
        $service->setEntityManager($serviceLocator->get('Doctrine\ORM\EntityManager'));
        return $service;
    }
}