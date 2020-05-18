<?php

namespace App\Domain\SOLID;

use Doctrine\ORM\Mapping as ORM;

/**
 * Api
 *
 * @ORM\Table(name="api")
 * @ORM\Entity
 * 
 * @category SOLID_Entity
 * @package  ORM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroup.wordpress.com
 */
class Api
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
     * Version
     * 
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=8, nullable=false, options={"fixed"=true})
     */
    private $_version;

    /**
     * Release date
     * 
     * @var \DateTime
     *
     * @ORM\Column(name="release", type="datetime", nullable=false)
     */
    private $_release;

}
