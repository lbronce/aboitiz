<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyTemplate
 *
 * @ORM\Table(name="survey_template")
 * @ORM\Entity
 */
class SurveyTemplate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="survey_template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $surveyTemplateId;

    /**
     * @var string
     *
     * @ORM\Column(name="survey_template_name", type="string", length=255, nullable=true)
     */
    private $surveyTemplateName;

    /**
     * @var string
     *
     * @ORM\Column(name="survey_template_description", type="text", length=65535, nullable=true)
     */
    private $surveyTemplateDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="survey_template_active", type="string", length=45, nullable=true)
     */
    private $surveyTemplateActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="survey_template_date_created", type="datetime", nullable=true)
     */
    private $surveyTemplateDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="survey_template_created_by", type="integer", nullable=true)
     */
    private $surveyTemplateCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="survey_template_date_updated", type="datetime", nullable=true)
     */
    private $surveyTemplateDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="survey_template_updated_by", type="integer", nullable=true)
     */
    private $surveyTemplateUpdatedBy;


}

