<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceCategories
 *
 * @ORM\Table(name="service_categories", indexes={@ORM\Index(name="service_categories_service_id_idx", columns={"service_category_parent_id"})})
 * @ORM\Entity
 */
class ServiceCategories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="service_category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $serviceCategoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="service_category_name", type="string", length=255, nullable=true)
     */
    private $serviceCategoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="service_category_description", type="text", length=65535, nullable=true)
     */
    private $serviceCategoryDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="service_category_active", type="boolean", nullable=true)
     */
    private $serviceCategoryActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_category_date_created", type="datetime", nullable=true)
     */
    private $serviceCategoryDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="service_category_created_by", type="integer", nullable=true)
     */
    private $serviceCategoryCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_category_date_updated", type="datetime", nullable=true)
     */
    private $serviceCategoryDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="service_category_updated_by", type="integer", nullable=true)
     */
    private $serviceCategoryUpdatedBy;

    /**
     * @var \Services
     *
     * @ORM\ManyToOne(targetEntity="Services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_category_parent_id", referencedColumnName="service_id")
     * })
     */
    private $serviceCategoryParent;


}

