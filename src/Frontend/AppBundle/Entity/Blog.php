<?php

namespace Frontend\AppBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\BlogRepository")
 */
class Blog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tittle", type="string", length=255)
     */
    private $tittle;
    
    
       /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePosted", type="datetime",  nullable=true)
     */
    private $datePosted;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" , inversedBy = "userBlogs")
     */
    private $user;

    

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status" , inversedBy = "blogs")
     */
    private $status;
    
    
     /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Category" , inversedBy = "blogs")
     */
    private $category;
    
    /**
     * @var File
     *
     * @Assert\File(maxSize = "1M")
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;
    
     /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $file_name;


  
    /**
     * @ORM\ManyToMany(targetEntity="Tags", mappedBy="blogs")
     **/
    private $tags;

    public function __construct() {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    public function getTags()
    {
        return $this->tags;
    }
    
    
     public function addTag(Tags $tag)
    {
        $tag->addBlog($this); // synchronously updating inverse side
        $this->tags->add($tag);
    }
    
    public function removeTag(Tags $tag)
    {
       
      $tag->removeBlog($this); 
      $this->tags->removeElement($tag);
      
      
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
     * Set tittle
     *
     * @param string $tittle
     * @return News
     */
    public function setTittle($tittle)
    {
        $this->tittle = $tittle;

        return $this;
    }

    /**
     * Get tittle
     *
     * @return string 
     */
    public function getTittle()
    {
        return $this->tittle;
    }
    
    
    /**
     * Set slug
     *
     * @param string $slug
     * @return Blog
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return News
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return News
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set datePosted
     *
     * @param \DateTime $datePosted
     * @return News
     */
    public function setDatePosted($datePosted)
    {
        $this->datePosted = $datePosted;

        return $this;
    }

    /**
     * Get datePosted
     *
     * @return \DateTime 
     */
    public function getDatePosted()
    {
        return $this->datePosted;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return News
     */
    public function setUser(\Frontend\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

   
    /**
     * Set status
     *
     * @param string $status
     * @return News
     */
    public function setStatus(\Frontend\AppBundle\Entity\Status $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    
    
    /**
     * Set category
     *
     * @param string $category
     * @return Blog
     */
    public function setCategory(\Frontend\AppBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    
     public function getPath() {
        return $this->path;
    }
    
    
     /**
     * Set file_name
     *
     * @param string $file_name
     * @return file_name
     */
    public function setFileName($fileName) {
        $this->file_name = $fileName;

        return $this;
    }

    /**
     * Get file_name
     *
     * @return integer 
     */
    public function getFileName() {
        return $this->file_name;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Owner
     */
    public function setPhoto(UploadedFile $photo = null) {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto() {
        return $this->photo;
    }
    
     /**
     * Set path
     *
     * @param string $path
     * @return Description
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }
    
     public function getAbsolutePath() {
       // return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
      return null === $this->path ? null : 'uploads/images' . '/' . $this->path;
        //return null === $this->path ? null : $this->path;
    }
 

    public function getWebPath() {
       // return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
        return null === $this->path ? null :  $this->path;
        
    }

    public function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        //$em = $this->getDoctrine()->getManager();
        //return __DIR__.'/../../../../web/'.$this->getUploadDir();
        return '' ;
    }

    public function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
       return '';
  }


    
    
    public function upload($dir, $ipath) {
       

        if (null === $this->getPhoto()) {
            return;
        }

        $img_n = $this->getPhoto()->getClientOriginalName();
       
       $this->path = $ipath.$img_n;
       $this->file_name = $img_n;
 
       $path = $this->path;
 
        $this->getPhoto()->move($dir, $img_n );
     
        $this->photo = null;
        
        
        return true;
    }
    
    
}
