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

use ArrayObject;
use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="link")
 * @ORM\Entity(repositoryClass="PBG\Repository\LinkRepository")
 * 
 * @category HTML_Link_Provision
 * @package  HTTP_Link
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  Release: 1.0.0
 * @link     pbgroup.wordpress.com
 */
class Link extends ArrayObject
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
     * Array copy return
     *
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'id' => $this->id,
            'label' => $this->_label,
            'reference' => $this->_reference,
        ];
    }

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
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=48, nullable=true)
     */
    private $_label;

    /**
     * Label getter
     *
     * @return string|null
     */
    public function getLabel(): string
    {
        return $this->_label;
    }

    /**
     * Label setter
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
     * @ORM\Column(name="reference", type="string", length=512, nullable=false)
     */
    private $_reference;

    /**
     * Reference getter
     *
     * @return string
     */
    public function getReference(): string
    {
        return $this->_reference;
    }

    /**
     * Reference setter
     *
     * @param string $_reference Reference
     * 
     * @return self
     */
    public function setReference(string $_reference): self
    {
        $this->_reference = $_reference;

        return $this;
    }


}
