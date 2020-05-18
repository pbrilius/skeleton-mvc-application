<?php

namespace App\Domain\SOLID;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hashtag
 *
 * @ORM\Table(name="hashtag")
 * @ORM\Entity
 */
class Hashtag
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
     * @ORM\Column(name="label", type="string", length=32, nullable=false)
     */
    private $label;


}
