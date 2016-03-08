<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * AuditTrail
 *
 * @ORM\Table(name="audit_trail", indexes={@ORM\Index(name="modules_module_id_idx", columns={"audit_trail_module_id"})})
 * @ORM\Entity
 */
class AuditTrail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="audit_trail_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $auditTrailId;

    /**
     * @var integer
     *
     * @ORM\Column(name="audit_trail_user_id", type="integer", nullable=true)
     */
    private $auditTrailUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="audit_trail_timestamp", type="datetime", nullable=true)
     */
    private $auditTrailTimestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="audit_trail_action", type="text", nullable=true)
     */
    private $auditTrailAction;

    /**
     * @var \Modules
     *
     * @ORM\ManyToOne(targetEntity="Modules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="audit_trail_module_id", referencedColumnName="module_id")
     * })
     */
    private $auditTrailModule;


}

