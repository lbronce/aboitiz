<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UserCompanyRoles
 *
 * @ORM\Table(name="user_company_roles", indexes={@ORM\Index(name="roles_role_id_idx", columns={"ucr_role_id"}), @ORM\Index(name="companies_company_id_idx", columns={"ucr_company_id"}), @ORM\Index(name="IDX_1F4121F2B673F6FC", columns={"ucr_user_id"})})
 * @ORM\Entity
 */
class UserCompanyRoles
{
    /**
     * @var \Companies
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ucr_company_id", referencedColumnName="company_id")
     * })
     */
    private $ucrCompany;

    /**
     * @var \OauthUsers
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ucr_user_id", referencedColumnName="oauth_user_id")
     * })
     */
    private $ucrUser;

    /**
     * @var \Roles
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ucr_role_id", referencedColumnName="role_id")
     * })
     */
    private $ucrRole;


}

