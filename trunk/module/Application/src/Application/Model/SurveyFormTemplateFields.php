<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyFormTemplateFields
 *
 * @ORM\Table(name="survey_form_template_fields")
 * @ORM\Entity
 */
class SurveyFormTemplateFields
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sftf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sftfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sftf_field_type_id", type="integer", nullable=true)
     */
    private $sftfFieldTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="sftf_name", type="string", length=500, nullable=true)
     */
    private $sftfName;

    /**
     * @var string
     *
     * @ORM\Column(name="sftf_description", type="text", length=65535, nullable=true)
     */
    private $sftfDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sftf_active", type="boolean", nullable=true)
     */
    private $sftfActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sftf_date_created", type="datetime", nullable=true)
     */
    private $sftfDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="sftf_created_by", type="integer", nullable=true)
     */
    private $sftfCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sftf_date_updated", type="datetime", nullable=true)
     */
    private $sftfDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="sftf_updated_by", type="integer", nullable=true)
     */
    private $sftfUpdatedBy;


}

