<?php

namespace TutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="TutoBundle\Repository\publicationRepository")
 */
class publication
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
     * @ORM\Column(name="contents", type="text")
     */
    private $contents;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="TutoBundle\Entity\comment" , mappedBy ="publication")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="TutoBundle\Entity\Users")
     */
    private $user;

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
     * Set contents
     *
     * @param string $contents
     *
     * @return publication
     */
    public function setContents($contents)
    {
        $this->contents = $contents;

        return $this;
    }

    /**
     * Get contents
     *
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return publication
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDate(new \DateTime());
    }

    /**
     * Add comment
     *
     * @param \TutoBundle\Entity\comment $comment
     *
     * @return publication
     */
    public function addComment(\TutoBundle\Entity\comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \TutoBundle\Entity\comment $comment
     */
    public function removeComment(\TutoBundle\Entity\comment $comment)
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
     * Set user
     *
     * @param \TutoBundle\Entity\Users $user
     *
     * @return publication
     */
    public function setUser(\TutoBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TutoBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}
