<?php

namespace TutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="TutoBundle\Repository\noteRepository")
 */
class note implements IEntity
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
     * @var float
     *
     * @ORM\Column(name="note", type="float")
     *  @Assert\Regex( pattern="/^[0-9]+/",
     *     match = true,
     *     message="le champ ne doit pas contenir de chiffre"
     * )
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="TutoBundle\Entity\etudiant")
     * @Assert\NotBlank(message="ne doit pas etre vide")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="TutoBundle\Entity\matiere")
     * @Assert\NotBlank(message="ne doit pas etre vide")
     */
    private $matiere;


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
     * Set note
     *
     * @param integer $note
     *
     * @return note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set etudiant
     *
     * @param \TutoBundle\Entity\etudiant $etudiant
     *
     * @return note
     */
    public function setEtudiant(\TutoBundle\Entity\etudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \TutoBundle\Entity\etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set matiere
     *
     * @param \TutoBundle\Entity\matiere $matiere
     *
     * @return note
     */
    public function setMatiere(\TutoBundle\Entity\matiere $matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \TutoBundle\Entity\matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
}
