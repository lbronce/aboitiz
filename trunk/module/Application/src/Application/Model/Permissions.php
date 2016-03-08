<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * Permissions
 *
 * @ORM\Table(name="permissions")
 * @ORM\Entity
 */
class Permissions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $permissionId;

    /**
     * @var string
     *
     * @ORM\Column(name="permission_name", type="string", length=255, nullable=true)
     */
    private $permissionName;

    /**
     * @var string
     *
     * @ORM\Column(name="permission_description", type="text", length=65535, nullable=true)
     */
    private $permissionDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="permission_active", type="boolean", nullable=true)
     */
    private $permissionActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="permission_date_created", type="datetime", nullable=true)
     */
    private $permissionDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="permission_created_by", type="integer", nullable=true)
     */
    private $permissionCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="permission_date_updated", type="datetime", nullable=true)
     */
    private $permissionDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="permission_updated_by", type="integer", nullable=true)
     */
    private $permissionUpdatedBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Roles", mappedBy="rolePermissionPermission")
     */
    private $rolePermissionRole;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rolePermissionRole = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

