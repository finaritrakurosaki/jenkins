<?php

namespace TutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="TutoBundle\Repository\etudiantRepository")
 */
class etudiant implements IEntity
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
     * @ORM\Column(name="nom", type="string", length=50)
     * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "Votre nom doit avoir au moins {{ limit }} mots",
     *      maxMessage = "votre nom ne doit pas dépasser {{ limit }} mots"
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "Votre prenom doit avoir au moins {{ limit }} mots",
     *      maxMessage = "votre prenom ne doit pas dépasser {{ limit }} mots"
     * )
     */
    private $prenom;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return etudiant
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
}
