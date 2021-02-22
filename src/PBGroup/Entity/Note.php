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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity(repositoryClass="PBG\Repository\NoteRepository")
 * 
 * @category HTML_Note_Provision
 * @package  HTTP_Note
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @version  Release: 1.0.0
 * @link     pbgroup.wordpress.com
 */
class Note extends ArrayObject
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->voiceMemos = new ArrayCollection;
    }

    /**
     * Voice memo collection add up
     *
     * @param string $record Record
     * 
     * @return self
     */
    public function memoVoice(string $record): self
    {
        $memo = new VoiceMemo;
        $memo->setRecord($record);
        $memo->setNote($this);

        $this->voiceMemos->add($record);

        return $this;
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
     * Note text
     * 
     * @var string|null
     *
     * @ORM\Column(name="text", type="text", length=16777215, nullable=true)
     */
    private $_text;

    /**
     * Text setter
     *
     * @param string $text Text
     * 
     * @return void
     */
    public function setText(string $text)
    {
        $this->_text = $text;

        return $this;
    }
    
    /**
     * Text getter
     *
     * @return string|null
     */
    public function getText(): string
    {
        return $this->_text;
    }

    /**
     * Links JSON
     * 
     * @var string|null
     *
     * @ORM\Column(name="links", type="json", nullable=true)
     */
    private $_links;

    /**
     * Links serializable getter
     *
     * @return string
     */
    public function getLinks(): string
    {
        return $this->_links;
    }

    /**
     * Links setter
     *
     * @param string $links Links
     * 
     * @return self
     */
    public function setLinks(string $links): self
    {
        $this->_links = $links;

        return $this;
    }

    /**
     * Hashtags JSON
     * 
     * @var string|null
     *
     * @ORM\Column(name="hashtags", type="json", nullable=true)
     */
    private $_hashtags;

    /**
     * Hahstags setter
     *
     * @param string $_hashtags Hahstags
     * 
     * @return self
     */
    public function setHashtags(string $_hashtags): self
    {
        $this->_hashtags = $_hashtags;

        return $this;
    }

    /**
     * Hashtags getter
     *
     * @return string
     */
    public function getHashtags(): string
    {
        return $this->_hashtags;
    }

    /**
     * Images JSON
     * 
     * @var string|null
     *
     * @ORM\Column(name="images", type="json", nullable=true)
     */
    private $_images;

    /**
     * Images getter
     *
     * @return string
     */
    public function getImages(): string
    {
        return $this->_images;
    }

    /**
     * Images setter
     *
     * @param string $_images Images
     * 
     * @return self
     */
    public function setImages(string $_images): self
    {
        $this->_images = $_images;
        
        return $this;
    }

    /**
     * G-map 
     * 
     * @var string|null
     *
     * @ORM\Column(name="gmap", type="json", nullable=true)
     */
    private $_gmap;

    /**
     * G-map getter
     *
     * @return string
     */
    public function getGmap(): string
    {
        return $this->_gmap;
    }

    /**
     * G-map setter
     *
     * @param string $_gmap G-map
     * 
     * @return self
     */
    public function setGmap(string $_gmap): self
    {
        $this->_gmap = $_gmap;

        return $this;
    }

    /**
     * Note user
     * 
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="PBG\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $_user;

    /**
     * User getter
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->_user;
    }

    /**
     * User setter
     *
     * @param User $_user User
     * 
     * @return self
     */
    public function setUser(User $_user): self
    {
        $this->_user = $_user;

        return $this;
    }

    /**
     * Voice memos
     *
     * @var ArrayCollection
     */
    private $_voiceMemos;

    /**
     * Voice memos setter
     *
     * @param ArrayCollection $_voiceMemos Voice memos
     * 
     * @return self
     */
    public function setVoiceMemos(ArrayCollection $_voiceMemos): self
    {
        $this->_voiceMemos = $_voiceMemos;

        return $this;
    }

    /**
     * Voice memos getter
     *
     * @return ArrayCollection
     */
    public function getVoiceMemos(): ArrayCollection
    {
        return $this->voiceMemos;
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
            'text' => $this->_text,
            'links' => $this->_links,
            'hashtags' => $this->_hashtags,
            'images' => $this->_images,
            'gmap' => $this->_gmap,
            'user' => $this->_user,
            'voiceMemos' => $this->_voiceMemos,
        ];
    }


}
