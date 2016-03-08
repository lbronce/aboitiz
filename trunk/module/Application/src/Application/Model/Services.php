<?php
namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity
 */
class Services
{
    /**
     * @var integer
     *
     * @ORM\Column(name="service_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $serviceId;

    /**
     * @var string
     *
     * @ORM\Column(name="service_name", type="string", length=255, nullable=true)
     */
    private $serviceName;

    /**
     * @var string
     *
     * @ORM\Column(name="service_description", type="string", length=255, nullable=true)
     */
    private $serviceDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="service_active", type="boolean", nullable=true)
     */
    private $serviceActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_date_created", type="datetime", nullable=true)
     */
    private $serviceDateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="service_created_by", type="integer", nullable=true)
     */
    private $serviceCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="service_date_updated", type="datetime", nullable=true)
     */
    private $serviceDateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="service_updated_by", type="integer", nullable=true)
     */
    private $serviceUpdatedBy;

    function getServiceId() {
        return $this->serviceId;
    }

    function getServiceName() {
        return $this->serviceName;
    }

    function getServiceDescription() {
        return $this->serviceDescription;
    }

    function getServiceActive() {
        return $this->serviceActive;
    }

    function getServiceDateCreated() {
        return $this->serviceDateCreated;
    }

    function getServiceCreatedBy() {
        return $this->serviceCreatedBy;
    }

    function getServiceDateUpdated() {
        return $this->serviceDateUpdated;
    }

    function getServiceUpdatedBy() {
        return $this->serviceUpdatedBy;
    }

    function setServiceId($serviceId) {
        $this->serviceId = $serviceId;
    }

    function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }

    function setServiceDescription($serviceDescription) {
        $this->serviceDescription = $serviceDescription;
    }

    function setServiceActive($serviceActive) {
        $this->serviceActive = $serviceActive;
    }

    function setServiceDateCreated(\DateTime $serviceDateCreated) {
        $this->serviceDateCreated = $serviceDateCreated;
    }

    function setServiceCreatedBy($serviceCreatedBy) {
        $this->serviceCreatedBy = $serviceCreatedBy;
    }

    function setServiceDateUpdated(\DateTime $serviceDateUpdated) {
        $this->serviceDateUpdated = $serviceDateUpdated;
    }

    function setServiceUpdatedBy($serviceUpdatedBy) {
        $this->serviceUpdatedBy = $serviceUpdatedBy;
    }


}

