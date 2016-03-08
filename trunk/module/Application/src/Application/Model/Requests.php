<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * Requests
 *
 * @ORM\Table(name="requests", indexes={@ORM\Index(name="service_categories_service_category_id_idx", columns={"request_service_category_id"}), @ORM\Index(name="module_workflow_statuses_status_id_idx", columns={"request_status_id"}), @ORM\Index(name="documents_document_id_idx", columns={"request_document_id"})})
 * @ORM\Entity
 */
class Requests
{
    /**
     * @var integer
     *
     * @ORM\Column(name="request_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $requestId;

    /**
     * @var string
     *
     * @ORM\Column(name="request_parameters", type="text", nullable=true)
     */
    private $requestParameters;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_company_id", type="integer", nullable=true)
     */
    private $requestCompanyId;

    /**
     * @var string
     *
     * @ORM\Column(name="request_remarks", type="text", nullable=true)
     */
    private $requestRemarks;

    /**
     * @var string
     *
     * @ORM\Column(name="request_attachments", type="text", nullable=true)
     */
    private $requestAttachments;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_schedule_status_id", type="integer", nullable=true)
     */
    private $requestScheduleStatusId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="request_active", type="boolean", nullable=true)
     */
    private $requestActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="request_date_created", type="datetime", nullable=true)
     */
    private $requestDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_created_by", type="integer", nullable=true)
     */
    private $requestCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="request_date_updated", type="datetime", nullable=true)
     */
    private $requestDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_updated_by", type="integer", nullable=true)
     */
    private $requestUpdatedBy;

    /**
     * @var \Documents
     *
     * @ORM\ManyToOne(targetEntity="Documents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="request_document_id", referencedColumnName="document_id")
     * })
     */
    private $requestDocument;

    /**
     * @var \ModuleWorkflowStatuses
     *
     * @ORM\ManyToOne(targetEntity="ModuleWorkflowStatuses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="request_status_id", referencedColumnName="mws_id")
     * })
     */
    private $requestStatus;

    /**
     * @var \ServiceCategories
     *
     * @ORM\ManyToOne(targetEntity="ServiceCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="request_service_category_id", referencedColumnName="service_category_id")
     * })
     */
    private $requestServiceCategory;


}

