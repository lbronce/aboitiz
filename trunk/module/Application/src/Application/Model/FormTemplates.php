<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * FormTemplates
 *
 * @ORM\Table(name="form_templates", indexes={@ORM\Index(name="services_form_templates_service_id_idx", columns={"form_template_service_type_id"})})
 * @ORM\Entity
 */
class FormTemplates
{
    private $formTemplateRel;

    public function __construct() {
        $this->formTemplateRel = new ArrayCollection;
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="form_template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formTemplateId;

    /**
     * @var integer
     *
     * @ORM\Column(name="form_template_service_type_id", type="integer", nullable=true)
     */
    private $formTemplateServiceTypeId;
    /**
     * @var integer
     *
     * @ORM\Column(name="form_template_service_category_id", type="integer", nullable=true)
     */
    private $formTemplateServiceCategoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="form_template_name", type="string", length=500, nullable=true)
     */
    private $formTemplateName;

    /**
     * @var string
     *
     * @ORM\Column(name="form_template_description", type="text", length=65535, nullable=true)
     */
    private $formTemplateDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="form_template_active", type="boolean", nullable=true)
     */
    private $formTemplateActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="form_template_date_created", type="datetime", nullable=true)
     */
    private $formTemplateDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="form_template_created_by", type="integer", nullable=true)
     */
    private $formTemplateCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="form_template_date_updated", type="datetime", nullable=true)
     */
    private $formTemplateDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="form_template_updated_by", type="integer", nullable=true)
     */
    private $formTemplateUpdatedBy;

    /**
     * @var \Services
     *
     * @ORM\ManyToOne(targetEntity="Services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="form_template_service_type_id", referencedColumnName="service_id")
     * })
     */
    private $formTemplateServiceType;

    function getFormTemplateId() {
        return $this->formTemplateId;
    }

    function getFormTemplateServiceCategoryId() {
        return $this->formTemplateServiceCategoryId;
    }

    function getFormTemplateName() {
        return $this->formTemplateName;
    }

    function getFormTemplateDescription() {
        return $this->formTemplateDescription;
    }

    function getFormTemplateActive() {
        return $this->formTemplateActive;
    }

    function getFormTemplateDateCreated() {
        return $this->formTemplateDateCreated;
    }

    function getFormTemplateCreatedBy() {
        return $this->formTemplateCreatedBy;
    }

    function getFormTemplateDateUpdated() {
        return $this->formTemplateDateUpdated;
    }

    function getFormTemplateUpdatedBy() {
        return $this->formTemplateUpdatedBy;
    }

    function getFormTemplateServiceType() {
        return $this->formTemplateServiceType;
    }

    function setFormTemplateId($formTemplateId) {
        $this->formTemplateId = $formTemplateId;
    }

    function setFormTemplateServiceCategoryId($formTemplateServiceCategoryId) {
        $this->formTemplateServiceCategoryId = $formTemplateServiceCategoryId;
    }

    function setFormTemplateName($formTemplateName) {
        $this->formTemplateName = $formTemplateName;
    }

    function setFormTemplateDescription($formTemplateDescription) {
        $this->formTemplateDescription = $formTemplateDescription;
    }

    function setFormTemplateActive($formTemplateActive) {
        $this->formTemplateActive = $formTemplateActive;
    }

    function setFormTemplateDateCreated(\DateTime $formTemplateDateCreated) {
        $this->formTemplateDateCreated = $formTemplateDateCreated;
    }

    function setFormTemplateCreatedBy($formTemplateCreatedBy) {
        $this->formTemplateCreatedBy = $formTemplateCreatedBy;
    }

    function setFormTemplateDateUpdated(\DateTime $formTemplateDateUpdated) {
        $this->formTemplateDateUpdated = $formTemplateDateUpdated;
    }

    function setFormTemplateUpdatedBy($formTemplateUpdatedBy) {
        $this->formTemplateUpdatedBy = $formTemplateUpdatedBy;
    }

    function setFormTemplateServiceType(\Services $formTemplateServiceType) {
        $this->formTemplateServiceType = $formTemplateServiceType;
    }


}

