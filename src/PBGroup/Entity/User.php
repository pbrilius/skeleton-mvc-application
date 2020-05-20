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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;
use Ramsey\Uuid\UuidInterface;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="PBG\Repository\UserRepository")
 * @HasLifecycleCallbacks
 * 
 * @category HTML_User_Provision
 * @package  HTTP_User
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  Release: 1.0.0
 * @link     pbgroup.wordpress.com
 */
class User extends \ArrayObject implements UserEntityInterface, ClientEntityInterface
{
    /**
     * Default ORM constructor
     */
    public function __construct()
    {
        $this->_notes = new ArrayCollection();
    }
    /**
     * Take a note
     *
     * @param string $text Note text
     * 
     * @return self
     */
    public function noteDown(string $text)
    {
        $note = new Note;
        $note->setText($text);
        $this->_notes->add($note);

        return $this;
    }    

    /**
     * Array copy return
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->_id,
            'email' => $this->_email,
            'hash' => $this->_hash,
            'notes' => $this->getNotes(),
        ];
    }
    
    
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
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * OAuth 2.0 indentifier
     * 
     * @var UuidInterface|null
     *
     * @ORM\Column(name="identifier", type="string", length=128, nullable=true)
     */
    private $_identifier;

    /**
     * Identifier getter
     *
     * @inheritDoc
     * 
     * @return UuidInterface|null
     */
    public function getIdentifier(): UuidInterface
    {
        return $this->_identifier;
    }

    /**
     * Identifier setter
     *
     * @param UuidInterface $_identifier UUID
     * 
     * @return self
     */
    public function setIdentifier(UuidInterface $_identifier): self
    {
        $this->_identifier = $_identifier;

        return $this;
    }

    /**
     * Email
     * 
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $_email;

    /**
     * Hash
     * 
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=512, nullable=false)
     */
    private $_hash;

    /**
     * Roles
     * 
     * @var string|null
     *
     * @ORM\Column(name="roles", type="json", nullable=true)
     */
    private $_roles;

    /**
     * Roles getter
     *
     * @return string
     */
    public function getRoles(): string
    {
        return $this->_roles;
    }

    /**
     * Roles case
     *
     * @param string $_roles Roles
     * 
     * @return self
     */
    public function setRoles(string $_roles): self
    {
        $this->_roles = $_roles;
        
        return $this;
    }

    /**
     * Attributes
     * 
     * @var string|null
     *
     * @ORM\Column(name="attributes", type="json", nullable=true)
     */
    private $_attributes;

    /**
     * Attributes setter
     *
     * @param string $_attributes Attributes
     * 
     * @return self
     */
    public function setAttributes(string $_attributes): self
    {
        $this->_attributes = $_attributes;
        
        return $this;
    }

    /**
     * Attributes getter
     *
     * @return string
     */
    public function getAttributes(): string
    {
        return $this->_attributes;
    }

    /**
     * Notes
     *
     * @var ArrayCollection
     */
    private $_notes;

    /**
     * Notes getter
     *
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->_notes;
    }

    /**
     * Pre-persist callback
     * 
     * @PrePersist
     *
     * @return void
     */
    public function whirlpoolHash(): void
    {
        $this->_hash = hash('whirlpool', $this->_hash);
    }

    /**
     * Email setter
     *
     * @param string $_email Email
     * 
     * @return self
     */
    public function setEmail(string $_email): self
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * Email getter
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * Hash setter
     *
     * @param string $_hash Hash
     * 
     * @return self
     */
    public function setHash(string $_hash): self
    {
        $this->_hash = $_hash;

        return $this;
    }

    /**
     * Hash getter
     *
     * @return string
     */
    public function getHash(): string
    {
        return $this->_hash;
    }

    /**
     * OAuth property - prerequisite
     * 
     * @var bool|null
     *
     * @ORM\Column(name="confidential", type="boolean", nullable=true)
     */
    private $_confidential;

    /**
     * OAuth prerequisite
     * 
     * @var string|null
     *
     * @ORM\Column(name="redirectUri", type="string", length=256, nullable=true)
     */
    private $_redirecturi;

    /**
     * League redirect URI getter
     *
     * @inheritdoc
     * 
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->_redirecturi;
    }

    /**
     * Redirect URI setter
     *
     * @param string $_redirecturi Redirect URI
     * 
     * @return self
     */
    public function setRedirectUri(string $_redirecturi): self
    {
        $this->_redirecturi = $_redirecturi;
        
        return $this; 
    }

    /**
     * Status of confidentiality
     *
     * @return boolean
     */
    public function isConfidential()
    {
        return $this->_confidential;
    }

    /**
     * Confidential status setter
     *
     * @param boolean $confidential Confidential state
     * 
     * @return self
     */
    public function setConfidential(bool $confidential): self
    {
        $this->_confidential = $confidential;

        return $this;
    }

    /**
     * OAuth 2.0 interface requirement
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->_email;
    }

}
