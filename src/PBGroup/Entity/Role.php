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
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="App\Repository\RoleRepository")
 * 
 * @category HTML_Role_Provision
 * @package  HTTP_Role
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  Release: 1.0.0
 * @link     pbgroup.wordpress.com
 */
class Role extends \ArrayObject
{
    /**
     * Entity ID
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
     * Label
     * 
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
     * Priority
     * 
     * @var int
     *
     * @ORM\Column(name="priority", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $_priority;
    
    /**
     * Priority setter
     *
     * @param integer $_priority Priority
     * 
     * @return self
     */
    public function setPriority(int $_priority): self
    {
        $this->_priority = $_priority;
        
        return $this;
    }

    /**
     * Priority getter
     *
     * @return integer
     */
    public function getPriority(): int
    {
        return $this->_priority;
    }

    /**
     * Array copy
     *
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            'id' => $this->_id,
            'label' => $this->_label,
            'priority' => $this->_priority,
        ];
    }


}
