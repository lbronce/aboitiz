<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EmailTemplates
 *
 * @ORM\Table(name="email_templates", indexes={@ORM\Index(name="mws_email_templates_mws_id_idx", columns={"email_template_mws_id"})})
 * @ORM\Entity
 */
class EmailTemplates
{
    /**
     * @var integer
     *
     * @ORM\Column(name="email_template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailTemplateId;

    /**
     * @var string
     *
     * @ORM\Column(name="email_template_name", type="string", length=45, nullable=true)
     */
    private $emailTemplateName;

    /**
     * @var string
     *
     * @ORM\Column(name="email_template_content", type="text", nullable=true)
     */
    private $emailTemplateContent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_template_active", type="boolean", nullable=true)
     */
    private $emailTemplateActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="email_template_date_created", type="datetime", nullable=true)
     */
    private $emailTemplateDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_template_created_by", type="integer", nullable=true)
     */
    private $emailTemplateCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="email_template_date_updated", type="datetime", nullable=true)
     */
    private $emailTemplateDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_template_updated_by", type="integer", nullable=true)
     */
    private $emailTemplateUpdatedBy;

    /**
     * @var \ModuleWorkflowStatuses
     *
     * @ORM\ManyToOne(targetEntity="ModuleWorkflowStatuses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_template_mws_id", referencedColumnName="mws_id")
     * })
     */
    private $emailTemplateMws;


}

