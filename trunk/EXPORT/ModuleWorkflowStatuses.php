<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ModuleWorkflowStatuses
 *
 * @ORM\Table(name="module_workflow_statuses")
 * @ORM\Entity
 */
class ModuleWorkflowStatuses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="mws_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mwsId;

    /**
     * @var string
     *
     * @ORM\Column(name="mws_name", type="string", length=255, nullable=true)
     */
    private $mwsName;

    /**
     * @var string
     *
     * @ORM\Column(name="mws_description", type="text", length=65535, nullable=true)
     */
    private $mwsDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mws_active", type="boolean", nullable=true)
     */
    private $mwsActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mws_date_created", type="datetime", nullable=true)
     */
    private $mwsDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="mws_created_by", type="integer", nullable=true)
     */
    private $mwsCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mws_date_updated", type="datetime", nullable=true)
     */
    private $mwsDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="mws_updated_by", type="integer", nullable=true)
     */
    private $mwsUpdatedBy;


}

