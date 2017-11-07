<?php

namespace Lddt\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Draw
 *
 * @ORM\Table(name="draw")
 * @ORM\Entity(repositoryClass="Lddt\MainBundle\Repository\DrawRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Draw
{
    /**
     * @ORM\OneToMany(targetEntity="Lddt\MainBundle\Entity\Comment",mappedBy="draw")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Lddt\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Lddt\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="moderateur_id",referencedColumnName="id",onDelete="CASCADE")
     */
    private $moderateur;

    /**
     * @ORM\OneToOne(targetEntity="Lddt\MainBundle\Entity\Pic",cascade={"persist","remove"} ,inversedBy="draw")
     * @ORM\JoinColumn(name="pic_id",referencedColumnName="id",nullable=true)
     *
     */
    private $pic;


    /**
     * Plusieurs Dessins (Many) dans (To) une catégorie (One)
     * @ORM\ManyToOne(targetEntity="Lddt\MainBundle\Entity\Category")
     * @ORM\JoinColumn(name="id_category",referencedColumnName="id",onDelete="CASCADE")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Lddt\MainBundle\Entity\Color",cascade={"persist"})
     */
    private $colors;

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="draw_path", type="string", length=255,nullable=true)
     */
    private $drawPath;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_online", type="boolean")
     */
    private $isOnline;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name", type="string", length=255, nullable=true)
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="author_avatar_path", type="string", length=255, nullable=true)
     */
    private $authorAvatarPath;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


    public function __construct($author,$is_online = false)
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
        $this->setIsOnline($is_online);
        $this->setAuthor($author);
    }


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
     * Set title
     *
     * @param string $title
     *
     * @return Draw
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
     * Set drawPath
     *
     * @param string $drawPath
     *
     * @return Draw
     */
    public function setDrawPath($drawPath)
    {
        $this->drawPath = $drawPath;

        return $this;
    }

    /**
     * Get drawPath
     *
     * @return string
     */
    public function getDrawPath()
    {
        return $this->drawPath;
    }

    /**
     * Set isOnline
     *
     * @param boolean $isOnline
     *
     * @return Draw
     */
    public function setIsOnline($isOnline)
    {
        $this->isOnline = $isOnline;

        return $this;
    }

    /**
     * Get isOnline
     *
     * @return bool
     */
    public function getIsOnline()
    {
        return $this->isOnline;
    }

    /**
     * Set authorName
     *
     * @param string $authorName
     *
     * @return Draw
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Get authorName
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set authorAvatarPath
     *
     * @param string $authorAvatarPath
     *
     * @return Draw
     */
    public function setAuthorAvatarPath($authorAvatarPath)
    {
        $this->authorAvatarPath = $authorAvatarPath;

        return $this;
    }

    /**
     * Get authorAvatarPath
     *
     * @return string
     */
    public function getAuthorAvatarPath()
    {
        return $this->authorAvatarPath;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Draw
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Draw
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set category
     *
     * @param \Lddt\MainBundle\Entity\Category $category
     *
     * @return Draw
     */
    public function setCategory(\Lddt\MainBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Lddt\MainBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }


//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        $string = "J'adore le dessin {$this->getTitle()} réalisé par {$this->getAuthorName()}";
//        return $string;
//    }

    /**
     * Add color
     *
     * @param \Lddt\MainBundle\Entity\Color $color
     *
     * @return Draw
     */
    public function addColor(\Lddt\MainBundle\Entity\Color $color)
    {
        $this->colors[] = $color;

        return $this;
    }

    /**
     * Remove color
     *
     * @param \Lddt\MainBundle\Entity\Color $color
     */
    public function removeColor(\Lddt\MainBundle\Entity\Color $color)
    {
        $this->colors->removeElement($color);
    }

    /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColors()
    {
        return $this->colors;
    }





    /**
     * Set author
     *
     * @param \Lddt\UserBundle\Entity\User $author
     *
     * @return Draw
     */
    public function setAuthor(\Lddt\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Lddt\UserBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add comment
     *
     * @param \Lddt\MainBundle\Entity\Comment $comment
     *
     * @return Draw
     */
    public function addComment(\Lddt\MainBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Lddt\MainBundle\Entity\Comment $comment
     */
    public function removeComment(\Lddt\MainBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set pic
     *
     * @param \Lddt\MainBundle\Entity\Pic $pic
     *
     * @return Draw
     */
    public function setPic(\Lddt\MainBundle\Entity\Pic $pic = null)
    {
        $this->pic = $pic;

        return $this;
    }

    /**
     * Get pic
     *
     * @return \Lddt\MainBundle\Entity\Pic
     */
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * Set moderateur
     *
     * @param \Lddt\UserBundle\Entity\User $moderateur
     *
     * @return Draw
     */
    public function setModerateur(\Lddt\UserBundle\Entity\User $moderateur = null)
    {
        $this->moderateur = $moderateur;

        return $this;
    }

    /**
     * Get moderateur
     *
     * @return \Lddt\UserBundle\Entity\User
     */
    public function getModerateur()
    {
        return $this->moderateur;
    }

    /**
     * @ORM\PostRemove
     */
    public function postRemove() {
        if($file = $this->getPic()->getAbsolutePath()) {
          //  var_dump($this->id,$this->getPic()->getId());
//            die();
            // Suppression du fichier si on supprimer l'entité
            unlink($file);
        }
    }
}
