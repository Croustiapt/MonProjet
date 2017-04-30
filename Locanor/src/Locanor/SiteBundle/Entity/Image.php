<?php

namespace Locanor\SiteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oc_image")
 * @ORM\Entity(repositoryClass="Locanor\SiteBundle\Entity\ImageRepository")
 * @ORM\HaslifecycleCallBacks()
 */
class Image
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;


  /**
  * @var \DateTime
  *
  * @ORM\Column(name="updated_at", type="datetime", nullable=true)
  */

  private $updateAt;

  /**
  * @ORM\PostLoad()
  */

  public function postLoad()
  {

   $this->updateAt = new \DateTime();
  }

  /**
   * @ORM\Column(name="url", type="string", length=255, nullable=true)
   * @Assert\NotBlank()
   */
  private $url;

  private $file;

  /**
   * @ORM\Column(name="alt", type="string", length=255)
   * @Assert\NotBlank()
   */
  private $alt;





public function getUploadRootDir()
{
  return dirname('/../../../../web/uploads');

}

public function getAbsolutePath()
{
  return null === $this->url ? null : $this->getUploadRootDir().'/'.$this->url;
}

/**
* @ORM\PrePersist()
* @ORM\PreUpdate()
*/

 public function preUpload()
 {

  $this->tempFile = $this-> getAbsolutePath();
  $this->oldFile = $this->getUrl();
  $this->updateAt = new \DateTime();
 
  if(null !== $this->file)
  $this->url = sha1(uniqid(mt_rand(),true)).'.'.$this->guessExtension();

  if (null !== $this->file){
    
    $this->file->move($this->getUploadRootDir(),$this->url);
    unset($this->file);

    if ($this->oldFile != null)
      unlink($this->tempFile);

  }

 }

/**
* @ORM\PostPersist()
* @ORM\PostUpdate()
*/

public function upload()
{
  if (null !== $this->file){
    
    $this->file->move($this->getUploadRootDir(),$this->url);
    unset($this->file);

    if ($this->oldFile != null)
      unlink($this->tempFile);

  }
}


/**
* @ORM\PreRemove()
*/

public function preRemoveUpload()
{
  $this->tempFile = $this->getAbsolutePath();

}

/**
* @ORM\PostRemove()
*/

public function removeUpload()
{
  if (file_exists($this->tempFile))
    unlink($this->tempFile);
}



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Image
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
