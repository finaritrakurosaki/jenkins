<?php

namespace TutoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity(repositoryClass="TutoBundle\Repository\matiereRepository")
 */
class matiere implements IEntity
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
     * @ORM\Column(name="nom_matiere", type="string", length=50)
     * @Assert\Regex( pattern="/\d/",
     *     match=false,
     *     message="le champ ne doit pas contenir de chiffre"
     * )
     */
    private $nomMatiere;


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
     * Set nomMatiere
     *
     * @param string $nomMatiere
     *
     * @return matiere
     */
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    /**
     * Get nomMatiere
     *
     * @return string
     */
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }
}
