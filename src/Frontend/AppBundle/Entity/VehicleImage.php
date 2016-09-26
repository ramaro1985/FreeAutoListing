<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description
 *
 * @ORM\Table(name="vehicleimage")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\VehicleImageRepository")
 */
class VehicleImage
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $file_name;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var File
     *
     * @Assert\File(maxSize = "124k")
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $thumbPath;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Gallery" , inversedBy = "vehicleImages")
     */
    private $gallery;

    public function getFeaturedImage()
    {
        if ($this->getOrden() == 0) {
            return $this;
        }
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getThumbPath()
    {
        return $this->thumbPath;
    }

    public function getAbsolutePath()
    {
        // return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
        return null === $this->path ? null : 'uploads/images' . '/' . $this->path;
        //return null === $this->path ? null : $this->path;
    }


    public function getWebPath()
    {
        // return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
        return null === $this->path ? null : $this->path;

    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        //$em = $this->getDoctrine()->getManager();
        //return __DIR__.'/../../../../web/'.$this->getUploadDir();
        return '';
    }

    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '';
    }

    public function getWebPathLargeVehicle($user_id, $vehicle_serie)
    {

        return 'uploads/images/' . $user_id . '/' . $vehicle_serie . "/large/" . $this->getFileName();
    }

    public function getWebPathMediumVehicle($user_id, $vehicle_serie)
    {

        return 'uploads/images/' . $user_id . '/' . $vehicle_serie . "/medium/" . $this->getFileName();
    }

    public function getWebPathThumbnailVehicle($user_id, $vehicle_serie)
    {

        return 'uploads/images/' . $user_id . '/' . $vehicle_serie . "/thumbnail/" . $this->getFileName();
    }


    public function upload($dir, $ipath, $iiid)
    {

        //$name.="ppp";
        // the file Profile can be empty if the field is not required
        if (null === $this->getPhoto()) {
            return;
        }
        //var_dump($this->getPhoto());
        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the
        // target filename to move to
        //$this->getPhoto()->move($this->getUploadRootDir(), $this->getPhoto()->getClientOriginalName());
        $img_n = $this->getPhoto()->getClientOriginalName();
        $dot = false;
        $ext = "";
        //$ext=$ext."g"; 
        for ($i = 0; $i < strlen($img_n); $i++) {//FIX/LOCTIONS
            if ($img_n[$i] == "." && !$dot)
                $dot = true;
            if ($dot)
                $ext .= $img_n[$i];
            //$ext=$ext."g"; 
        }
        // $this->path = $ipath.$iiid.$ext;
        $this->path = $ipath . $iiid . $ext;
        $this->file_name = $iiid . $ext;
        // $this->path = $this->getUploadRootDir().$dir;
        //$mid=$this.getId();
        //$dir=getUploadRootDir().$dir;
        $path = $this->path;

        //var_dump($path);
        //$this->createthumb($this->path, "tumb".$iiid.$ext, 150, 150);

        $this->getPhoto()->move($dir, $iiid . $ext);

        // set the path Profile to the filename where you've saved the file
        // $this->path = $this->getPhoto()->getClientOriginalName();

        // clean up the file Profile as you won't need it anymore
        //$this->getPhoto()->
        $this->photo = null;


        return true;
    }

    public function uploadThumb($dir, $ipathThumb, $iiid)
    {


        //$name.="ppp";
        // the file Profile can be empty if the field is not required
        if (null === $this->getPhoto()) {
            return;
        }
        //var_dump($this->getPhoto());
        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the
        // target filename to move to
        //$this->getPhoto()->move($this->getUploadRootDir(), $this->getPhoto()->getClientOriginalName());
        $img_n = $this->getPhoto()->getClientOriginalName();
        $dot = false;
        $ext = "";
        //$ext=$ext."g"; 
        for ($i = 0; $i < strlen($img_n); $i++) {//FIX/LOCTIONS
            if ($img_n[$i] == "." && !$dot)
                $dot = true;
            if ($dot)
                $ext .= $img_n[$i];
            //$ext=$ext."g"; 
        }
        // $this->path = $ipath.$iiid.$ext;

        $this->thumbPath = $ipathThumb . $iiid . $ext;
        $this->file_name = $iiid . $ext;
        // $this->path = $this->getUploadRootDir().$dir;
        //$mid=$this.getId();
        //$dir=getUploadRootDir().$dir;
        $path = $this->path;

        //var_dump($path);
        //$this->createthumb($this->path, "tumb".$iiid.$ext, 150, 150);

        $this->getPhoto()->move($dir, $iiid . $ext);

        // set the path Profile to the filename where you've saved the file
        // $this->path = $this->getPhoto()->getClientOriginalName();

        // clean up the file Profile as you won't need it anymore
        //$this->getPhoto()->
        $this->photo = null;


        return true;
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
     * Set name
     *
     * @param string $title
     * @return title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }


    /**
     * Set file_name
     *
     * @param string $file_name
     * @return file_name
     */
    public function setFileName($fileName)
    {
        $this->file_name = $fileName;

        return $this;
    }

    /**
     * Get file_name
     *
     * @return integer
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Owner
     */
    public function setPhoto(UploadedFile $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Description
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }


    /**
     * Set thumbpath
     *
     * @param string $thumbpath
     * @return Description
     */
    public function setThumbPath($thumbpath)
    {
        $this->thumbPath = $thumbpath;

        return $this;
    }

    /**
     * Set gallery
     *
     * @param integer $gallery
     * @return Rates
     */
    public function setGallery(\Frontend\AppBundle\Entity\Gallery $gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return integer
     */
    public function getGallery()
    {
        return $this->gallery;
    }

}
