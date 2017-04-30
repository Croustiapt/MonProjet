<?php

namespace Locanor\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Locanor\SiteBundle\Repository\clientRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class client
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $prenom;

      /**
   * @var \DateTime
   *
   * @ORM\Column(name="datedenaissance", type="datetime")
   */
  private $datedenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $adresse;

        /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $ville;


        /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $pays;

        /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="integer")
     * @Assert\NotBlank()
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * @Assert\Length(min=4, max=8, minMessage="Votre code postal est trop court", maxMessage = "Votre code postal est trop long")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email(message = "L'email saisie n'est pas un email valide.", checkMX = true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     * @Assert\Regex("/(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}/", message = "Votre numéro de Téléphone est invalide, Ex:+33 0612345678 pour la france.")
     */
    private $telephone;

        /**
     * @var string
     *
     * @ORM\Column(name="DateDebut", type="string", length=255)
     */
    private $DateDebut;

        /**
     * @var string
     *
     * @ORM\Column(name="HeureDebut", type="string", length=255)
     */
    private $HeureDebut;

        /**
     * @var string
     *
     * @ORM\Column(name="DateFin", type="string", length=255)
     */
    private $DateFin;

        /**
     * @var string
     *
     * @ORM\Column(name="HeureFin", type="string", length=255)
     */
    private $HeureFin;

            /**
     * @var string
     *
     * @ORM\Column(name="voiture", type="string", length=255)
     */
    private $voiture;

                /**
     * @var string
     *
     * @ORM\Column(name="MontantLoc", type="string", length=255)
     */
    private $MontantLoc;




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
     * Set name
     *
     * @param string $name
     *
     * @return client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return client
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return client
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return client
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return client
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return client
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return integer
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set datedenaissance
     *
     * @param \DateTime $datedenaissance
     *
     * @return client
     */
    public function setDatedenaissance($datedenaissance)
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    /**
     * Get datedenaissance
     *
     * @return \DateTime
     */
    public function getDatedenaissance()
    {
        return $this->datedenaissance;
    }

    /**
     * Set dateDebut
     *
     * @param string $dateDebut
     *
     * @return client
     */
    public function setDateDebut($dateDebut)
    {
        $this->DateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return string
     */
    public function getDateDebut()
    {
        return $this->DateDebut;
    }

    /**
     * Set heureDebut
     *
     * @param string $heureDebut
     *
     * @return client
     */
    public function setHeureDebut($heureDebut)
    {
        $this->HeureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return string
     */
    public function getHeureDebut()
    {
        return $this->HeureDebut;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     *
     * @return client
     */
    public function setDateFin($dateFin)
    {
        $this->DateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * Set heureFin
     *
     * @param string $heureFin
     *
     * @return client
     */
    public function setHeureFin($heureFin)
    {
        $this->HeureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return string
     */
    public function getHeureFin()
    {
        return $this->HeureFin;
    }

    /**
     * Set voiture
     *
     * @param string $voiture
     *
     * @return client
     */
    public function setVoiture($voiture)
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * Get voiture
     *
     * @return string
     */
    public function getVoiture()
    {
        return $this->voiture;
    }

    /**
     * Set montantLoc
     *
     * @param string $montantLoc
     *
     * @return client
     */
    public function setMontantLoc($montantLoc)
    {
        $this->MontantLoc = $montantLoc;

        return $this;
    }

    /**
     * Get montantLoc
     *
     * @return string
     */
    public function getMontantLoc()
    {
        return $this->MontantLoc;
    }
}
