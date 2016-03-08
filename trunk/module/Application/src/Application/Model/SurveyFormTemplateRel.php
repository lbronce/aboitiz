<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyFormTemplateRel
 *
 * @ORM\Table(name="survey_form_template_rel", indexes={@ORM\Index(name="survey_form_template_fields_survey_form_template_rel_sftf_i_idx", columns={"sftr_sftf_id"}), @ORM\Index(name="field_types_survey_form_template_rel_field_type_idx", columns={"sftr_field_type"}), @ORM\Index(name="IDX_E361FD2673363E6F", columns={"sftr_survey_form_template_id"})})
 * @ORM\Entity
 */
class SurveyFormTemplateRel
{
    /**
     * @var \FieldTypes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="FieldTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sftr_field_type", referencedColumnName="field_type_id")
     * })
     */
    private $sftrFieldType;

    /**
     * @var \SurveyFormTemplateFields
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SurveyFormTemplateFields")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sftr_sftf_id", referencedColumnName="sftf_id")
     * })
     */
    private $sftrSftf;

    /**
     * @var \SurveyTemplate
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SurveyTemplate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sftr_survey_form_template_id", referencedColumnName="survey_template_id")
     * })
     */
    private $sftrSurveyFormTemplate;


}

