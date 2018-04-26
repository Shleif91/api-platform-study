<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="product", cascade={"persist"})
     */
    public $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection(); // Initialize $offers as an Doctrine collection
    }

    public function addOffer(Offer $offer): void
    {
        $offer->product = $this;
        $this->offers->add($offer);
    }

    public function removeOffer(Offer $offer): void
    {
        $offer->product = null;
        $this->offers->removeElement($offer);
    }
}