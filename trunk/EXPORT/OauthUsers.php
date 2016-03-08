<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OauthUsers
 *
 * @ORM\Table(name="oauth_users")
 * @ORM\Entity
 */
class OauthUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="oauth_user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oauthUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="oauth_user_first_name", type="string", length=255, nullable=true)
     */
    private $oauthUserFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="oauth_user_last_name", type="string", length=255, nullable=true)
     */
    private $oauthUserLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="oauth_user_email", type="string", length=255, nullable=false)
     */
    private $oauthUserEmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oauth_user_active", type="boolean", nullable=true)
     */
    private $oauthUserActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="oauth_user_date_created", type="datetime", nullable=true)
     */
    private $oauthUserDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="oauth_user_created_by", type="integer", nullable=true)
     */
    private $oauthUserCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="oauth_user_date_updated", type="datetime", nullable=true)
     */
    private $oauthUserDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="oauth_user_updated_by", type="integer", nullable=true)
     */
    private $oauthUserUpdatedBy;


}

