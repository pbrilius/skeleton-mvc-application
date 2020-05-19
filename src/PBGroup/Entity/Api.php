<?php
/**
 * SOLID silos area
 * 
 * PHP version 7
 * 
 * @category HTTP_SOLID
 * @package  HTTP_HTML_Entity
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  GIT: be4380e61536a8299fb82cdf2af0f9094fc52048
 * @link     pbgroup.wordpress.com
 */
namespace PBG\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * Api
 *
 * @ORM\Table(name="api")
 * @ORM\Entity(repositoryClass="App\Repository\ApiRepository")
 * 
 * @category SOLID_Entity
 * @package  ORM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroup.wordpress.com
 */
class Api
{
    /**
     * UUID identifier
     * 
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Column(name="id", type="uuid", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $_id;

    /**
     * ID getter
     *
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->_id;
    }

    /**
     * Version
     * 
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=8, nullable=false, options={"fixed"=true})
     */
    private $_version;

    /**
     * Version getter
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->_version;
    }

    /**
     * Version setter
     *
     * @param string $_version version
     * 
     * @return self
     */
    public function setVersion(string $_version): self
    {
        $this->_version = $_version;

        return $this;
    }

    /**
     * Release date
     * 
     * @var \DateTime
     *
     * @ORM\Column(name="release", type="datetime", nullable=false)
     */
    private $_release;

    /**
     * Release getter
     *
     * @return \DateTime
     */
    public function getRelease(): \DateTime
    {
        return $this->_release;
    }

    /**
     * Release setter
     *
     * @param \DateTime $release Release date
     * 
     * @return self
     */
    public function setRelease(\DateTime $release): self
    {
        $this->_release = $release;

        return $this;
    }

}
