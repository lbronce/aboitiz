<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * FormTemplateFields
 *
 * @ORM\Table(name="form_template_fields")
 * @ORM\Entity
 */
class FormTemplateFields
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ftf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ftfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ftf_field_type_id", type="integer", nullable=true)
     */
    private $ftfFieldTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="ftf_name", type="string", length=500, nullable=true)
     */
    private $ftfName;

    /**
     * @var string
     *
     * @ORM\Column(name="ftf_description", type="text", length=65535, nullable=true)
     */
    private $ftfDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="ftf_possible_values", type="text", length=65535, nullable=true)
     */
    private $ftfPossibleValues;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ftf_active", type="boolean", nullable=true)
     */
    private $ftfActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ftf_date_created", type="datetime", nullable=true)
     */
    private $ftfDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="ftf_created_by", type="integer", nullable=true)
     */
    private $ftfCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ftf_date_updated", type="datetime", nullable=true)
     */
    private $ftfDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="ftf_updated_by", type="integer", nullable=true)
     */
    private $ftfUpdatedBy;


}

