<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Modules
 *
 * @ORM\Table(name="modules")
 * @ORM\Entity
 */
class Modules
{
    /**
     * @var integer
     *
     * @ORM\Column(name="module_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $moduleId;

    /**
     * @var string
     *
     * @ORM\Column(name="module_name", type="string", length=255, nullable=true)
     */
    private $moduleName;

    /**
     * @var string
     *
     * @ORM\Column(name="module_description", type="text", length=65535, nullable=true)
     */
    private $moduleDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="module_active", type="boolean", nullable=true)
     */
    private $moduleActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="module_date_created", type="datetime", nullable=true)
     */
    private $moduleDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="module_created_by", type="integer", nullable=true)
     */
    private $moduleCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="module_date_updated", type="datetime", nullable=true)
     */
    private $moduleDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="module_updated_by", type="integer", nullable=true)
     */
    private $moduleUpdatedBy;


}

