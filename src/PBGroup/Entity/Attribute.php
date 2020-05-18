<?php

namespace App\Domain\SOLID;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribute
 *
 * @ORM\Table(name="attribute")
 * @ORM\Entity
 */
class Attribute
{
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
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=48, nullable=false)
     */
    private $label;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $priority;


}
