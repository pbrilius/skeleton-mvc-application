<?php

namespace App\Domain\SOLID;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use PBG\SOLID\VoiceMemo;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
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
     * @var \App\SOLID\User
     *
     * @ORM\ManyToOne(targetEntity="App\Domain\SOLID\User")
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
