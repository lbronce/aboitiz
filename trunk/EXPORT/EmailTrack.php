<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * EmailTrack
 *
 * @ORM\Table(name="email_track", indexes={@ORM\Index(name="oauth_users_oauth_user_id_idx", columns={"email_track_oauth_user_id"}), @ORM\Index(name="requests_request_id_idx", columns={"email_track_request_id"})})
 * @ORM\Entity
 */
class EmailTrack
{
    /**
     * @var integer
     *
     * @ORM\Column(name="email_track_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailTrackId;

    /**
     * @var string
     *
     * @ORM\Column(name="email_track_email_token", type="text", length=65535, nullable=true)
     */
    private $emailTrackEmailToken;

    /**
     * @var string
     *
     * @ORM\Column(name="email_track_timeout", type="string", length=20, nullable=true)
     */
    private $emailTrackTimeout;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_track_used", type="integer", nullable=true)
     */
    private $emailTrackUsed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_track_active", type="boolean", nullable=true)
     */
    private $emailTrackActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="email_track_date_created", type="datetime", nullable=true)
     */
    private $emailTrackDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_track_created_by", type="integer", nullable=true)
     */
    private $emailTrackCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="email_track_date_updated", type="datetime", nullable=true)
     */
    private $emailTrackDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_track_updated_by", type="integer", nullable=true)
     */
    private $emailTrackUpdatedBy;

    /**
     * @var \OauthUsers
     *
     * @ORM\ManyToOne(targetEntity="OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_track_oauth_user_id", referencedColumnName="oauth_user_id")
     * })
     */
    private $emailTrackOauthUser;

    /**
     * @var \Requests
     *
     * @ORM\ManyToOne(targetEntity="Requests")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_track_request_id", referencedColumnName="request_id")
     * })
     */
    private $emailTrackRequest;


}

