<?php
 // Filename: /module/Users/src/Users/Service/TemplateService.php
namespace Templates\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;

use Application\Model\FormTemplateFields;
use Application\Model\FormTemplateRel;
use Application\Model\FieldTypes;

class EmailTemplateService implements ServiceManagerAwareInterface, EventManagerAwareInterface
{
    protected $serviceManager;
    protected $eventManager;
    protected $entityManager;
    protected $entityRepository;

    public function getEntityRepository()
    {
        if (null === $this->entityRepository) {
            $this->setEntityRepository($this->getEntityManager()->getRepository('Application\Model\EmailTemplates'));
        }
        return $this->entityRepository;
    }
    /**
     * Returns all Entities
     *
     * @return EntityRepository
     */
    public function findAll()
    {
        $entities = $this->getEntityRepository()
                         ->findAll();
        
        return $entities;
    }

    public function find($id) {
        return $this->getEntityRepository()->find($id);
    }

    public function findByQuery(\Closure $query)
    {
        $queryBuilder = $this->getEntityRepository()->createQueryBuilder('entity');
        $currentQuery = call_user_func($query, $queryBuilder);
       // \Zend\Debug\Debug::dump($currentQuery->getQuery());
        return $currentQuery->getQuery()->getResult();
    }

    /**
     * Persists and Entity into the Repository
     *
     * @param Entity $entity
     * @return Entity
     */
    public function persist($entity)
    {
        $this->getEventManager()->trigger(__FUNCTION__ . '.pre', $this, array('entity'=>$entity));
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        $this->getEventManager()->trigger(__FUNCTION__ . '.post', $this, array('entity'=>$entity));

        return $entity;
    }

    /**
     * @param \Doctrine\ORM\EntityRepository $entityRepository
     * @return \Haushaltportal\Service\DoctrineEntityService
     */
    public function setEntityRepository(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
        return $this;
    }

    /**
     * @param EntityManager $entityManager
     * @return \Haushaltportal\Service\DoctrineEntityService
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
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
    
    
    public function getList(){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array('a.emailTemplateName, a.emailTemplateDescription'))
            ->from('Application\Model\FormTemplates', 'a')
            ->addOrderBy('a.emailTemplateId', 'DESC');

        return $qb->getQuery()->getArrayResult();
    }
    
    public function getById($id = null){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(
                array(
                'a.emailTemplateId', 
                'a.emailTemplateName', 
                'b.mwsId', 
                'a.emailTemplateContent',
                )
            )
            ->from('Application\Model\EmailTemplates', 'a')
            ->leftJoin('Application\Model\ModuleWorkflowStatuses', 'b', 'WITH', 'a.emailTemplateMws = b.mwsId')
            ->where('a.emailTemplateId = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult(Query::HYDRATE_ARRAY);
    }
    
    public function getStatuses(){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array('a'))
            ->from('Application\Model\ModuleWorkflowStatuses', 'a');

        return $qb->getQuery()->getArrayResult();
    }
    
    public function update($data = array()){
        // print_r($data); exit();
        $params = "";
        $params .= "{$data['emailTemplateId']},";
        $params .= "{$data['emailTemplateMwsId']},";
        $params .= "'{$data['emailTemplateName']}',";
        $params .= "'{$data['emailTemplateContent']}',";
        $params .= "1,";
        $params .= "1";
        
        $em = $this->getEntityManager();
        $sth = $em->getConnection()->prepare("CALL EMAIL_TEMPLATES_UPDATE({$params});");
        $sth->execute();
    }
    
    public function add($data = array()){
        $params = "";
        $params .= "{$data['emailTemplateMwsId']},";
        $params .= "'{$data['emailTemplateName']}',";
        $params .= "'{$data['emailTemplateContent']}',";
        $params .= "1,";
        $params .= "1";
        
        $em = $this->getEntityManager();
        $sth = $em->getConnection()->prepare("CALL EMAIL_TEMPLATES_ADD({$params});");
        $sth->execute();
    }
}