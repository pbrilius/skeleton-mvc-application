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

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="PBG\Repository\ImageRepository")
 * 
 * @category HTML_Image_Provision
 * @package  HTTP_Image
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  Release: 1.0.0
 * @link     pbgroup.wordpress.com
 */
class Image
{
    /**
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
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getId(): \Ramsey\Uuid\UuidInterface
    {
        return $this->_id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=48, nullable=false)
     */
    private $_label;

    /**
     * Label getter
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->_label;
    }

    /**
     * Undocumented function
     *
     * @param string $_label Label
     * 
     * @return self
     */
    public function setLabel(string $_label): self
    {
        $this->_label = $_label;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="jpeg", type="blob", length=65535, nullable=false)
     */
    private $_jpeg;

    /**
     * JPEG getter
     *
     * @return string
     */
    public function getJpeg(): string
    {
        return $this->_jpeg;
    }

    /**
     * JPEG setter
     *
     * @param string $_jpeg JPEG
     * 
     * @return self
     */
    public function setJpeg(string $_jpeg): self
    {
        $this->_jpeg = $_jpeg;

        return $this;
    }
}
