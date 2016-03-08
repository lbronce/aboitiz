<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * ModuleWorkflowRel
 *
 * @ORM\Table(name="module_workflow_rel", indexes={@ORM\Index(name="module_workflow_rel_module_workflow_id_idx", columns={"mwr_module_workflow_id"}), @ORM\Index(name="module_workflow_rel_mws_id_idx", columns={"mwr_mws_id"}), @ORM\Index(name="module_workflow_rel_mws_id_rel_idx", columns={"mws_mws_id_rel"})})
 * @ORM\Entity
 */
class ModuleWorkflowRel
{
    /**
     * @var \ModuleWorkflow
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ModuleWorkflow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mwr_module_workflow_id", referencedColumnName="module_workflow_id")
     * })
     */
    private $mwrModuleWorkflow;

    /**
     * @var \ModuleWorkflowStatuses
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ModuleWorkflowStatuses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mwr_mws_id", referencedColumnName="mws_id")
     * })
     */
    private $mwrMws;

    /**
     * @var \ModuleWorkflowStatuses
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ModuleWorkflowStatuses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mws_mws_id_rel", referencedColumnName="mws_id")
     * })
     */
    private $mwsMwsRel;


}

