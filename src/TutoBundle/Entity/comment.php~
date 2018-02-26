<?php

namespace TutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="TutoBundle\Repository\commentRepository")
 */
class comment
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @ORM\ManyToOne(targetEntity="TutoBundle\Entity\publication" ,inversedBy ="comments")
     */
    private $publication;

    /**
     * comment constructor.
     * @param \DateTime $datetime
     */

    /**
     * @ORM\ManyToOne(targetEntity="TutoBundle\Entity\Users" )
     */
    private $user;

    public function __construct()
    {
        $this->setDatetime(new \DateTime());
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
     * Set content
     *
     * @param string $content
     *
     * @return comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return comment
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set publication
     *
     * @param \TutoBundle\Entity\publication $publication
     *
     * @return comment
     */
    public function setPublication(\TutoBundle\Entity\publication $publication = null)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \TutoBundle\Entity\publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set user
     *
     * @param \TutoBundle\Entity\Users $user
     *
     * @return comment
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
