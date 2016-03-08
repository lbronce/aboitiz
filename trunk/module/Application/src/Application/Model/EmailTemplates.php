<?php
namespace Application\Model;



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
    
    function getEmailTemplateId() {
        return $this->emailTemplateId;
    }

    function getEmailTemplateName() {
        return $this->emailTemplateName;
    }

    function getEmailTemplateContent() {
        return $this->emailTemplateContent;
    }

    function getEmailTemplateActive() {
        return $this->emailTemplateActive;
    }

    function getEmailTemplateDateCreated() {
        return $this->emailTemplateDateCreated;
    }

    function getEmailTemplateCreatedBy() {
        return $this->emailTemplateCreatedBy;
    }

    function getEmailTemplateDateUpdated() {
        return $this->emailTemplateDateUpdated;
    }

    function getEmailTemplateUpdatedBy() {
        return $this->emailTemplateUpdatedBy;
    }

    function getEmailTemplateMws() {
        return $this->emailTemplateMws;
    }

    function setEmailTemplateId($emailTemplateId) {
        $this->emailTemplateId = $emailTemplateId;
    }

    function setEmailTemplateName($emailTemplateName) {
        $this->emailTemplateName = $emailTemplateName;
    }

    function setEmailTemplateContent($emailTemplateContent) {
        $this->emailTemplateContent = $emailTemplateContent;
    }

    function setEmailTemplateActive($emailTemplateActive) {
        $this->emailTemplateActive = $emailTemplateActive;
    }

    function setEmailTemplateDateCreated(\DateTime $emailTemplateDateCreated) {
        $this->emailTemplateDateCreated = $emailTemplateDateCreated;
    }

    function setEmailTemplateCreatedBy($emailTemplateCreatedBy) {
        $this->emailTemplateCreatedBy = $emailTemplateCreatedBy;
    }

    function setEmailTemplateDateUpdated(\DateTime $emailTemplateDateUpdated) {
        $this->emailTemplateDateUpdated = $emailTemplateDateUpdated;
    }

    function setEmailTemplateUpdatedBy($emailTemplateUpdatedBy) {
        $this->emailTemplateUpdatedBy = $emailTemplateUpdatedBy;
    }

    function setEmailTemplateMws(\ModuleWorkflowStatuses $emailTemplateMws) {
        $this->emailTemplateMws = $emailTemplateMws;
    }



}

