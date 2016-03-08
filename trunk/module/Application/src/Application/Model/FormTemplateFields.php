<?php
namespace Application\Model;



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

    function getFtfId() {
        return $this->ftfId;
    }

    function getFtfFieldTypeId() {
        return $this->ftfFieldTypeId;
    }

    function getFtfName() {
        return $this->ftfName;
    }

    function getFtfDescription() {
        return $this->ftfDescription;
    }

    function getFtfPossibleValues() {
        return $this->ftfPossibleValues;
    }

    function getFtfActive() {
        return $this->ftfActive;
    }

    function getFtfDateCreated() {
        return $this->ftfDateCreated;
    }

    function getFtfCreatedBy() {
        return $this->ftfCreatedBy;
    }

    function getFtfDateUpdated() {
        return $this->ftfDateUpdated;
    }

    function getFtfUpdatedBy() {
        return $this->ftfUpdatedBy;
    }

    function setFtfId($ftfId) {
        $this->ftfId = $ftfId;
    }

    function setFtfFieldTypeId($ftfFieldTypeId) {
        $this->ftfFieldTypeId = $ftfFieldTypeId;
    }

    function setFtfName($ftfName) {
        $this->ftfName = $ftfName;
    }

    function setFtfDescription($ftfDescription) {
        $this->ftfDescription = $ftfDescription;
    }

    function setFtfPossibleValues($ftfPossibleValues) {
        $this->ftfPossibleValues = $ftfPossibleValues;
    }

    function setFtfActive($ftfActive) {
        $this->ftfActive = $ftfActive;
    }

    function setFtfDateCreated(\DateTime $ftfDateCreated) {
        $this->ftfDateCreated = $ftfDateCreated;
    }

    function setFtfCreatedBy($ftfCreatedBy) {
        $this->ftfCreatedBy = $ftfCreatedBy;
    }

    function setFtfDateUpdated(\DateTime $ftfDateUpdated) {
        $this->ftfDateUpdated = $ftfDateUpdated;
    }

    function setFtfUpdatedBy($ftfUpdatedBy) {
        $this->ftfUpdatedBy = $ftfUpdatedBy;
    }


}

