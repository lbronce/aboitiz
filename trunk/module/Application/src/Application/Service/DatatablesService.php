<?php
 // Filename: /module/Application/src/Application/Service/DatatablesService.php
namespace Application\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class DatatablesService implements ServiceManagerAwareInterface, EventManagerAwareInterface
{
    protected $serviceManager;
    protected $eventManager;
    protected $entityManager;
    protected $entityRepository;
    public    $entity = null;
    public    $alias = 'a';
    public    $filters = array();

    public function __construct($params = array()){
        if(isset($params['model'])){
            $this->entity = $params['model'];
        }
    }
    
    public function getEntityRepository()
    {
        if (null === $this->entityRepository) {
            $this->setEntityRepository($this->getEntityManager()->getRepository($this->entity));
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
    
    /**
    * Perform the SQL queries needed for an server-side processing requested,
    * utilising the helper functions of this class, limit(), order() and
    * filter() among others. The returned array is ready to be encoded as JSON
    * in response to an SSP request, or can be modified if needed before
    * sending back to the client.
    *
    *  @param  array $request Data sent to server by DataTables
    *  @param  array|PDO $conn PDO connection resource or connection parameters array
    *  @param  string $table SQL table to query
    *  @param  string $primaryKey Primary key of the table
    *  @param  array $columns Column information array
    *  @return array          Server-side processing response array
    **/
    public function datatables()
    {
        // Main query to actually get the data
        $q = $this->entityManager->createQueryBuilder()
                   ->select(array($this->alias))
                   ->from($this->entity, $this->alias)
                   ->getQuery();
        
        if($_GET['search']['value'] !== ''){
            $my_filter = array();

            foreach($this->filters as $i => $filterValue){
                $my_filter[] = $this->alias . '.' . $filterValue;
            }
            
            if(!empty($my_filter)){
                // $qb->where('CONCAT(' . implode(',', $my_filter) . ') LIKE "%' . $_GET['search']['value'] . '%"');
                $q = $this->entityManager->createQuery("
                    SELECT {$this->alias}
                    FROM {$this->entity} {$this->alias}
                    WHERE CONCAT(" . implode(',', $my_filter) . ") LIKE '%{$_GET['search']['value']}%'
                ");
            }
        }
        
        $data = $q->getResult(Query::HYDRATE_ARRAY);
        
        $resData = array();
        foreach($data as $i => $v){
            $resData[$i] = array();
            foreach ($v as $Val){
                $resData[$i][] = $Val;
            }
        }
        
        // Data set length after filtering
        $resFilterLength = COUNT($data);
        $recordsFiltered = $resFilterLength[0][0];

        // Total data set length
        $resTotalLength = COUNT($data);
        $recordsTotal = $resTotalLength[0][0];


        /**
        *  Output
        **/
        $result = array(
            "draw"            => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $resData
        );
        
        $jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
	$_GET['callback'] :
	false;
        
        return $jsonp . '(' . json_encode($result) . ')';
    }
    
    public function datatables2($params = array('store_proc' => '', 'params' => array()))
    {
        // Main query to actually get the data
        $parameters = implode(",", $params['params']);

        // $native = "CALL TEMPLATES_SELECT('', {$_GET['length']}, {$_GET['start']})";
        $native = "CALL {$params['stored_proc']}({$parameters})";
        
        $q = $this->entityManager
                  ->getConnection()
                  ->prepare($native);
        $q->execute();
        $data = $q->fetchAll(Query::HYDRATE_ARRAY);
        
        $resData = array();
        foreach($data as $i => $v){
            $resData[$i] = array();
            foreach ($v as $Val){
                $resData[$i][] = $Val;
            }
        }
        
        // Data set length after filtering
        $resFilterLength = COUNT($data);
        $recordsFiltered = $resFilterLength[0][0];

        // Total data set length
        $resTotalLength = COUNT($data);
        $recordsTotal = $resTotalLength[0][0];


        /**
        *  Output
        **/
        $result = array(
            "draw"            => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $resData
        );
        
        $jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
	$_GET['callback'] :
	false;
        
        return $jsonp . '(' . json_encode($result) . ')';
    }
}
