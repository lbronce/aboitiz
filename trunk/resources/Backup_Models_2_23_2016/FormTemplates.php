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


}

