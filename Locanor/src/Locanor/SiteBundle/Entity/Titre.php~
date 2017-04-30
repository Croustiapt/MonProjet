<?php

namespace Locanor\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titre
 *
 * @ORM\Table(name="titre")
 * @ORM\Entity(repositoryClass="Locanor\SiteBundle\Repository\TitreRepository")
 */
class Titre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="M", type="string", length=255)
     */
    private $m;

    /**
     * @var string
     *
     * @ORM\Column(name="Mme", type="string", length=255)
     */
    private $mme;

    /**
     * @var string
     *
     * @ORM\Column(name="Mlle", type="string", length=255)
     */
    private $mlle;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set m
     *
     * @param string $m
     *
     * @return Titre
     */
    public function setM($m)
    {
        $this->m = $m;

        return $this;
    }

    /**
     * Get m
     *
     * @return string
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * Set mme
     *
     * @param string $mme
     *
     * @return Titre
     */
    public function setMme($mme)
    {
        $this->mme = $mme;

        return $this;
    }

    /**
     * Get mme
     *
     * @return string
     */
    public function getMme()
    {
        return $this->mme;
    }

    /**
     * Set mlle
     *
     * @param string $mlle
     *
     * @return Titre
     */
    public function setMlle($mlle)
    {
        $this->mlle = $mlle;

        return $this;
    }

    /**
     * Get mlle
     *
     * @return string
     */
    public function getMlle()
    {
        return $this->mlle;
    }
}
