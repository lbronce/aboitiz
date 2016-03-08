<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Documents
 *
 * @ORM\Table(name="documents")
 * @ORM\Entity
 */
class Documents
{
    /**
     * @var integer
     *
     * @ORM\Column(name="document_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentId;

    /**
     * @var string
     *
     * @ORM\Column(name="document_file_name", type="string", length=500, nullable=true)
     */
    private $documentFileName;

    /**
     * @var string
     *
     * @ORM\Column(name="document_location", type="string", length=500, nullable=true)
     */
    private $documentLocation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="document_active", type="boolean", nullable=true)
     */
    private $documentActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="document_date_created", type="datetime", nullable=true)
     */
    private $documentDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="document_created_by", type="integer", nullable=true)
     */
    private $documentCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="document_date_updated", type="datetime", nullable=true)
     */
    private $documentDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="document_updated_by", type="integer", nullable=true)
     */
    private $documentUpdatedBy;


}

