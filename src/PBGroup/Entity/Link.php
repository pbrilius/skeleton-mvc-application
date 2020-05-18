<?php

namespace App\Domain\SOLID;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="link")
 * @ORM\Entity
 */
class Link
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
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=48, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=512, nullable=false)
     */
    private $reference;


}
