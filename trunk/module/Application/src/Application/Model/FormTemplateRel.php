<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * FormTemplateRel
 *
 * @ORM\Table(name="form_template_rel", indexes={@ORM\Index(name="form_template_fields_form_template_rel_ftf_id_idx", columns={"ftr_ftf_id"}), @ORM\Index(name="field_types_form_template_rel_field_type_id_idx", columns={"ftr_field_type"}), @ORM\Index(name="IDX_309615FD6B77BEFA", columns={"ftr_form_template_id"})})
 * @ORM\Entity
 */
class FormTemplateRel
{
    /**
     * @var \FieldTypes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="FieldTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ftr_field_type", referencedColumnName="field_type_id")
     * })
     */
    private $ftrFieldType;

    /**
     * @var \FormTemplateFields
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="FormTemplateFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ftr_ftf_id", referencedColumnName="ftf_id")
     * })
     */
    private $ftrFtf;

    /**
     * @var \FormTemplates
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="FormTemplates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ftr_form_template_id", referencedColumnName="form_template_id")
     * })
     */
    private $ftrFormTemplate;

    function getFtrFieldType() {
        return $this->ftrFieldType;
    }

    function getFtrFtf() {
        return $this->ftrFtf;
    }

    function getFtrFormTemplate() {
        return $this->ftrFormTemplate;
    }

    function setFtrFieldType(\FieldTypes $ftrFieldType) {
        $this->ftrFieldType = $ftrFieldType;
    }

    function setFtrFtf(\FormTemplateFields $ftrFtf) {
        $this->ftrFtf = $ftrFtf;
    }

    function setFtrFormTemplate(\FormTemplates $ftrFormTemplate) {
        $this->ftrFormTemplate = $ftrFormTemplate;
    }


}

