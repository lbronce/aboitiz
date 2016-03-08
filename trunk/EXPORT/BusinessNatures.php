<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessNatures
 *
 * @ORM\Table(name="business_natures", indexes={@ORM\Index(name="companies_company_id_idx", columns={"business_nature_company_id"})})
 * @ORM\Entity
 */
class BusinessNatures
{
    /**
     * @var integer
     *
     * @ORM\Column(name="business_nature_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $businessNatureId;

    /**
     * @var string
     *
     * @ORM\Column(name="business_nature_name", type="string", length=255, nullable=true)
     */
    private $businessNatureName;

    /**
     * @var string
     *
     * @ORM\Column(name="business_nature_description", type="text", length=65535, nullable=true)
     */
    private $businessNatureDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="business_nature_active", type="boolean", nullable=true)
     */
    private $businessNatureActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="business_nature_date_created", type="datetime", nullable=true)
     */
    private $businessNatureDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="business_nature_created_by", type="integer", nullable=true)
     */
    private $businessNatureCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="business_nature_date_updated", type="datetime", nullable=true)
     */
    private $businessNatureDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="business_nature_updated_by", type="integer", nullable=true)
     */
    private $businessNatureUpdatedBy;

    /**
     * @var \Companies
     *
     * @ORM\ManyToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="business_nature_company_id", referencedColumnName="company_id")
     * })
     */
    private $businessNatureCompany;


}

