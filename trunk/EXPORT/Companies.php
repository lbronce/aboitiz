<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Companies
 *
 * @ORM\Table(name="companies")
 * @ORM\Entity
 */
class Companies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $companyId;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=255, nullable=true)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="company_principal_address", type="string", length=500, nullable=true)
     */
    private $companyPrincipalAddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="company_incorporation_date", type="datetime", nullable=true)
     */
    private $companyIncorporationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="company_operations_status", type="string", length=45, nullable=true)
     */
    private $companyOperationsStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="company_status_of_filing", type="string", length=45, nullable=true)
     */
    private $companyStatusOfFiling;

    /**
     * @var string
     *
     * @ORM\Column(name="company_status", type="string", length=45, nullable=true)
     */
    private $companyStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="company_business_address", type="string", length=500, nullable=true)
     */
    private $companyBusinessAddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="company_asm_date", type="datetime", nullable=true)
     */
    private $companyAsmDate;

    /**
     * @var string
     *
     * @ORM\Column(name="company_quorum_requirement", type="string", length=45, nullable=true)
     */
    private $companyQuorumRequirement;

    /**
     * @var string
     *
     * @ORM\Column(name="company_sec_registration_number", type="string", length=45, nullable=true)
     */
    private $companySecRegistrationNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="company_tin", type="string", length=45, nullable=true)
     */
    private $companyTin;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_contact", type="integer", nullable=true)
     */
    private $companyContact;


}

