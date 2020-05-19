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
 * VoiceMemo
 *
 * @ORM\Table(name="voice_memo", indexes={@ORM\Index(name="note", columns={"note"})})
 * @ORM\Entity(repositoryClass="PBG\Repository\VoiceMemo")
 * 
 * @category SOLID_Entity
 * @package  ORM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroup.wordpress.com
 */
class VoiceMemo
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
     * Record blob
     * 
     * @var string
     *
     * @ORM\Column(name="record", type="blob", length=65535, nullable=false)
     */
    private $_record;

    /**
     * Note referral
     * 
     * @var Note
     *
     * @ORM\ManyToOne(targetEntity="PBG\Entity\Note")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="note", referencedColumnName="id")
     * })
     */
    private $_note;

    /**
     * UUID getter
     *
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Record setter
     *
     * @param string $record record
     * 
     * @return self
     */
    public function setRecord(string $record)
    {
        $this->_record = $record;

        return $this;
    }

    /**
     * Record getter
     *
     * @return string
     */
    public function getRecord()
    {
        return $this->_record;
    }

    /**
     * Note setter
     *
     * @param Note $note note
     * 
     * @return self
     */
    public function setNote(Note $note)
    {
        $this->_note = $note;

        return $this;
    }

    /**
     * Note getter
     *
     * @return Note
     */
    public function getNote()
    {
        return $this->_note;
    }


}
