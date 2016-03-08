<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentTemplates
 *
 * @ORM\Table(name="document_templates", indexes={@ORM\Index(name="form_templates_document_templates_form_template_id_idx", columns={"document_template_form_template_id"})})
 * @ORM\Entity
 */
class DocumentTemplates
{
    /**
     * @var integer
     *
     * @ORM\Column(name="document_template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentTemplateId;

    /**
     * @var string
     *
     * @ORM\Column(name="document_template_name", type="string", length=255, nullable=true)
     */
    private $documentTemplateName;

    /**
     * @var string
     *
     * @ORM\Column(name="document_template_content", type="text", nullable=true)
     */
    private $documentTemplateContent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="document_template_active", type="boolean", nullable=true)
     */
    private $documentTemplateActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="document_tenmplate_date_created", type="datetime", nullable=true)
     */
    private $documentTenmplateDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="document_template_created_by", type="integer", nullable=true)
     */
    private $documentTemplateCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="document_template_date_updated", type="datetime", nullable=true)
     */
    private $documentTemplateDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="document_template_updated_by", type="integer", nullable=true)
     */
    private $documentTemplateUpdatedBy;

    /**
     * @var \FormTemplates
     *
     * @ORM\ManyToOne(targetEntity="FormTemplates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_template_form_template_id", referencedColumnName="form_template_id")
     * })
     */
    private $documentTemplateFormTemplate;


}

