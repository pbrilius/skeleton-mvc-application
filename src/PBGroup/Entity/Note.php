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
class Note
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
     * @param string $record
     * @return self
     */
    public function memoVoice(string $record)
    {
        $memo = new VoiceMemo;
        $memo->setRecord($record);
        $memo->setNote($this);

        $this->voiceMemos->add($record);

        return $this;
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
     * @var string|null
     *
     * @ORM\Column(name="text", type="text", length=16777215, nullable=true)
     */
    private $text;

    /**
     * Text setter
     *
     * @return self
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }
    
    /**
     * Text getter
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @var json|null
     *
     * @ORM\Column(name="links", type="json", nullable=true)
     */
    private $links;

    /**
     * @var json|null
     *
     * @ORM\Column(name="hashtags", type="json", nullable=true)
     */
    private $hashtags;

    /**
     * @var json|null
     *
     * @ORM\Column(name="images", type="json", nullable=true)
     */
    private $images;

    /**
     * @var json|null
     *
     * @ORM\Column(name="gmap", type="json", nullable=true)
     */
    private $gmap;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="PBG\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Voice memos
     *
     * @var ArrayCollection
     */
    private $voiceMemos;

    /**
     * Voice memos getter
     *
     * @return ArrayCollection
     */
    public function getVoiceMemos()
    {
        return $this->voiceMemos;
    }


}
