<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * FieldTypes
 *
 * @ORM\Table(name="field_types")
 * @ORM\Entity
 */
class FieldTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="field_type_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fieldTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="field_type_name", type="string", length=500, nullable=true)
     */
    private $fieldTypeName;

    /**
     * @var string
     *
     * @ORM\Column(name="field_type_description", type="text", length=65535, nullable=true)
     */
    private $fieldTypeDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="field_type_template", type="text", length=65535, nullable=true)
     */
    private $fieldTypeTemplate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="field_type_active", type="boolean", nullable=true)
     */
    private $fieldTypeActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="field_type_date_created", type="datetime", nullable=true)
     */
    private $fieldTypeDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="field_type_created_by", type="integer", nullable=true)
     */
    private $fieldTypeCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="field_type_date_updated", type="datetime", nullable=true)
     */
    private $fieldTypeDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="field_type_updated_by", type="integer", nullable=true)
     */
    private $fieldTypeUpdatedBy;


}

