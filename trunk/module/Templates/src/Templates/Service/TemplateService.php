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

class TemplateService implements ServiceManagerAwareInterface, EventManagerAwareInterface
{
    protected $serviceManager;
    protected $eventManager;
    protected $entityManager;
    protected $entityRepository;

    public function getEntityRepository()
    {
        if (null === $this->entityRepository) {
            $this->setEntityRepository($this->getEntityManager()->getRepository('Application\Model\FormTemplates'));
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
            ->select(array('a.formTemplateName, a.formTemplateDescription'))
            ->from('Application\Model\FormTemplates', 'a')
            ->addOrderBy('a.formTemplateId', 'DESC');

        return $qb->getQuery()->getArrayResult();
    }
    
    public function getById($id = null){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array(
                'a.formTemplateId', 
                'a.formTemplateName', 
                'a.formTemplateServiceTypeId', 
                'a.formTemplateDescription', 
                'b.documentTemplateContent'))
            ->from('Application\Model\FormTemplates', 'a')
            ->leftJoin('Application\Model\DocumentTemplates', 'b', 'WITH', 'a.formTemplateId = b.documentTemplateFormTemplate')
            ->where('a.formTemplateId = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult(Query::HYDRATE_ARRAY);
    }
    
    public function getTemplateFieldsByFormTemplateId($id = null){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array(
                "b.ftfId",
                "b.ftfFieldTypeId",
                "b.ftfName",
                "b.ftfDescription",
                "b.ftfPossibleValues", 
                "b.ftfActive",
                "b.ftfDateCreated",
                "b.ftfCreatedBy",
                "b.ftfDateUpdated",
                "b.ftfUpdatedBy",
                "c.fieldTypeId",
                "c.fieldTypeName",
            ))
            ->from('Application\Model\FormTemplateRel', 'a')
            ->leftJoin('Application\Model\FormTemplateFields', 'b', 'WITH', 'a.ftrFtf = b.ftfId')
            ->leftJoin('Application\Model\FieldTypes', 'c', 'WITH', 'c.fieldTypeId = a.ftrFieldType')
            ->where('a.ftrFormTemplate = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getArrayResult();
    }
    
    public function getFieldTypes(){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array('a'))
            ->from('Application\Model\FieldTypes', 'a');

        return $qb->getQuery()->getArrayResult();
    }
    
    public function getServices(){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array('a'))
            ->from('Application\Model\Services', 'a');

        return $qb->getQuery()->getArrayResult();
    }
    
    /*
    public function deleteFtfByTemplateId($formTemplateId = null){
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(array("a"))
            ->from('Application\Model\FormTemplateRel', 'a')
            ->where('a.ftrFormTemplate = :id')
            ->setParameter('id', $formTemplateId);

        $ftfForDelete = $qb->getQuery()->getResult(Query::HYDRATE_ARRAY); 
        
        foreach($ftfForDelete as $v){
            $em = $this->getEntityManager();
            // Delete Ftr
            $ftr = $em->getReference('Application\Model\FormTemplateRel', array(
                'ftrFormTemplate'   => $v['ftr_form_template_id'],
                'ftrFtf'            => $v['ftr_ftf_id'],
                'ftrFieldType'      => $v['ftr_field_type']
            ));
            
            $em->remove($ftr);
            $em->flush();
            
            // Delete Ftf
            $ftf = $em->getReference('Application\Model\FormTemplateFields', array('ftfId' => $v['ftr_form_template_id']));
            
            $em->remove($ftf);
            $em->flush();
        }
    }
    */
    
    public function clearExistingFieldsByFormTemplateId($formTemplateId = null){
        // TEMPLATES_DELETE_EXISTING_FIELDS
        $em = $this->getEntityManager();
        $sth = $em->getConnection()->prepare("CALL TEMPLATES_DELETE_EXISTING_FIELDS({$formTemplateId})");
        $sth->execute();
    }
    
    public function persistFtf($data = array()){
        $em = $this->getEntityManager();
        
        $ftf = new FormTemplateFields();
        $ftf->setFtfName($data['ftfName']);
        $ftf->setFtfDescription($data['ftfDescription']);
        $ftf->setFtfPossibleValues($data['ftfPossibleValues']);
        $em->persist($ftf);
        $em->flush();
        
        // prepare statement
        $sth = $em->getConnection()->prepare("CALL TEMPLATES_SYNC_FORM_TEMPLATE_FIELDS({$data['ftfFormTemplateId']},{$ftf->getFtfId()},{$data['ftfFieldTypeId']})");
        $sth->execute();
        
        // $stmt = $em->createNativeQuery("CALL TEMPLATES_SYNC_FORM_TEMPLATE_FIELDS({$data['ftfFormTemplateId']},{$ftf->getFtfId()},{$data['ftfFieldTypeId']})", $rsm);  
                    //->setParameter('template_id', $data['ftfFormTemplateId'])
                    //->setParameter('form_template_field_id', $ftf->getFtfId())
                    //->setParameter('field_type', $data['ftfFieldTypeId']);
        
        // $stmt->getResult();
        /*                    
        $query = $em->createQuery('CALL TEMPLATES_SYNC_FORM_TEMPLATE_FIELDS(:template_id,:form_template_field_id,:field_type)')
                    ->setParameter('template_id', $data['ftfFormTemplateId'])
                    ->setParameter('form_template_field_id', $ftf->getFtfId())
                    ->setParameter('field_type', $data['ftfFieldTypeId']);

        $query->getResult();
        */
        
        /*
        $ftr = new FormTemplateRel();
        $fieldTypes = $em->getReference('Application\Model\FieldTypes', array('fieldTypeId' => $data['ftfFieldTypeId']));
        $formTemplates = $em->getReference('Application\Model\FormTemplates', array('formTemplateId' => $data['ftfFormTemplateId']));
        
        $ftr->setFtrFieldType( $fieldTypes->getFieldTypeId() );
        $ftr->setFtrFtf($ftf->getFtfId());
        $ftr->setFtrFormTemplate( $formTemplates->getFormTemplateId() );
        
        $em->persist($ftr);
        $em->flush();
        */
        
        return $ftf->getFtfId();
    }

}
/*
 * 
    a.ftfId
    a.ftfFieldTypeId
    a.ftfName
    a.ftfDescription
    a.ftfPossibleValues 
    a.ftfActive
    a.ftfDateCreated
    a.ftfCreatedBy
    a.ftfDateUpdated
    a.ftfUpdatedBy
    c.fieldTypeName
 */