<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Holidays
 *
 * @ORM\Table(name="holidays")
 * @ORM\Entity
 */
class Holidays
{
    /**
     * @var integer
     *
     * @ORM\Column(name="holiday_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $holidayId;

    /**
     * @var string
     *
     * @ORM\Column(name="holiday_name", type="string", length=255, nullable=true)
     */
    private $holidayName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="holiday_date", type="date", nullable=true)
     */
    private $holidayDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="holiday_active", type="boolean", nullable=true)
     */
    private $holidayActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="holiday_month", type="integer", nullable=true)
     */
    private $holidayMonth;

    /**
     * @var integer
     *
     * @ORM\Column(name="holiday_day", type="integer", nullable=true)
     */
    private $holidayDay;

    /**
     * @var integer
     *
     * @ORM\Column(name="holiday_year", type="integer", nullable=true)
     */
    private $holidayYear;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="holiday_date_created", type="datetime", nullable=true)
     */
    private $holidayDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="holiday_created_by", type="integer", nullable=true)
     */
    private $holidayCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="holiday_date_updated", type="datetime", nullable=true)
     */
    private $holidayDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="holiday_updated_by", type="integer", nullable=true)
     */
    private $holidayUpdatedBy;


}

