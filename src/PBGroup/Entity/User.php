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
namespace App\Domain\SOLID;

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
        $this->notes->add($note);

        return $this;
    }    

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'hash' => $this->hash,
            'notes' => $this->getNotes(),
        ];
    }
    
    
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Column(name="id", type="uuid", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * ID getter
     *
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @var UuidInterface|null
     *
     * @ORM\Column(name="identifier", type="string", length=128, nullable=true)
     */
    private $identifier;

    /**
     * Identifier getter
     *
     * @inheritDoc
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Identifier setter
     *
     * @param UuidInterface $uuidInterface
     * @return self
     */
    public function setIdentifier(UuidInterface $uuidInterface)
    {
        $this->identifier = $uuidInterface;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=512, nullable=false)
     */
    private $hash;

    /**
     * @var json|null
     *
     * @ORM\Column(name="roles", type="json", nullable=true)
     */
    private $roles;

    /**
     * @var json|null
     *
     * @ORM\Column(name="attributes", type="json", nullable=true)
     */
    private $attributes;

    /**
     * Notes
     *
     * @var ArrayCollection
     */
    private $notes;

    /**
     * Notes getter
     *
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Pre-persist callback
     * 
     * @PrePersist
     *
     * @return void
     */
    public function whirlpoolHash()
    {
        $this->hash = hash('whirlpool', $this->hash);
    }

    /**
     * Email setter
     *
     * @param string $email
     * @return self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Email getter
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Hash setter
     *
     * @param string $hash
     * @return self
     */
    public function setHash(string $hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Hash getter
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * League name getter
     *
     * @inheritDoc
     */
    public function getName()
    {
        return $this->email;
    }

    /**
     * @var bool|null
     *
     * @ORM\Column(name="confidential", type="boolean", nullable=true)
     */
    private $confidential;

    /**
     * @var string|null
     *
     * @ORM\Column(name="redirectUri", type="string", length=256, nullable=true)
     */
    private $redirecturi;
    /**
     * League redirect URI getter
     *
     * @inheritdoc
     */
    public function getRedirectUri()
    {
        return $this->redirecturi;
    }

    /**
     * Status of confidentiality
     *
     * @return boolean
     */
    public function isConfidential()
    {
        return $this->confidential;
    }

    /**
     * Confidential status setter
     *
     * @param boolean $confidential
     * @return self
     */
    public function setConfidential(bool $confidential)
    {
        $this->confidential = $confidential;

        return $this;
    }


}
