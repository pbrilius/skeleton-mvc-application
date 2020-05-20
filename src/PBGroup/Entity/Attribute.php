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
 * Attribute
 *
 * @ORM\Table(name="attribute")
 * @ORM\Entity(repositoryClass="PBG\Repository\AttributeRepository")
 * 
 * @category HTML_Attribute_Provision
 * @package  HTTP_Attribute
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  Release: 1.0.0
 * @link     pbgroup.wordpress.com
 */
class Attribute extends ArrayObject
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
     * @return void
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->_id,
            'label' => $this->_label,
            'priority' => $this->_priority,
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
     * @var int
     *
     * @ORM\Column(name="priority", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $_priority;

    /**
     * Priority getter
     *
     * @return int
     */
    public function getPriority(): int
    {
        return $this->_priority;
    }

    /**
     * Priority setter
     *
     * @param integer $priority Priority
     * 
     * @return self
     */
    public function setPriority(int $priority): self
    {
        $this->_priority = $priority;

        return $this;
    }


}
