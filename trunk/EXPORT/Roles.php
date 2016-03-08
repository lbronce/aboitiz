<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity
 */
class Roles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var string
     *
     * @ORM\Column(name="role_name", type="string", length=255, nullable=true)
     */
    private $roleName;

    /**
     * @var string
     *
     * @ORM\Column(name="role_description", type="text", length=65535, nullable=true)
     */
    private $roleDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="role_active", type="boolean", nullable=true)
     */
    private $roleActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="role_date_created", type="datetime", nullable=true)
     */
    private $roleDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="role_created_by", type="integer", nullable=true)
     */
    private $roleCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="role_date_updated", type="datetime", nullable=true)
     */
    private $roleDateUpdated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="role_updated_by", type="datetime", nullable=true)
     */
    private $roleUpdatedBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Permissions", inversedBy="rolePermissionRole")
     * @ORM\JoinTable(name="role_permissions",
     *   joinColumns={
     *     @ORM\JoinColumn(name="role_permission_role_id", referencedColumnName="role_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role_permission_permission_id", referencedColumnName="permission_id")
     *   }
     * )
     */
    private $rolePermissionPermission;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rolePermissionPermission = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

