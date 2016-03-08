<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * ModuleWorkflow
 *
 * @ORM\Table(name="module_workflow", indexes={@ORM\Index(name="module_workflow_role_id_idx", columns={"module_workflow_role_id"}), @ORM\Index(name="module_workflow_module_id_idx", columns={"module_workflow_module_id"})})
 * @ORM\Entity
 */
class ModuleWorkflow
{
    /**
     * @var integer
     *
     * @ORM\Column(name="module_workflow_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $moduleWorkflowId;

    /**
     * @var string
     *
     * @ORM\Column(name="module_workflow_name", type="string", length=150, nullable=true)
     */
    private $moduleWorkflowName;

    /**
     * @var string
     *
     * @ORM\Column(name="module_workflow_description", type="string", length=255, nullable=true)
     */
    private $moduleWorkflowDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="module_workflow_active", type="boolean", nullable=true)
     */
    private $moduleWorkflowActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="module_workflow_date_created", type="datetime", nullable=true)
     */
    private $moduleWorkflowDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="module_workflow_created_by", type="integer", nullable=true)
     */
    private $moduleWorkflowCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="module_workflow_date_updated", type="datetime", nullable=true)
     */
    private $moduleWorkflowDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="module_workflow_updated_by", type="integer", nullable=true)
     */
    private $moduleWorkflowUpdatedBy;

    /**
     * @var integer
     *
     * @ORM\Column(name="roles_role_id", type="integer", nullable=false)
     */
    private $rolesRoleId;

    /**
     * @var \Modules
     *
     * @ORM\ManyToOne(targetEntity="Modules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="module_workflow_module_id", referencedColumnName="module_id")
     * })
     */
    private $moduleWorkflowModule;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="module_workflow_role_id", referencedColumnName="role_id")
     * })
     */
    private $moduleWorkflowRole;


}

