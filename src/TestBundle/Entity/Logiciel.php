<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logiciel
 *
 * @ORM\Table(name="logiciel")
 * @ORM\Entity(repositoryClass="TestBundle\Repository\LogicielRepository")
 */
class Logiciel
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;
    /**
     * @var string
     *
     * @ORM\Column(name="etatLogiciel", type="string", length=255, nullable=true)
     */
    private $etatLogiciel = "vrai";
    /**
     *
     * @ORM\ManyToMany(targetEntity="TestBundle\Entity\Server", mappedBy="logiciels")
     */
    private $servers;

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
     * @return Logiciel
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
     * Constructor
     */
    public function __construct()
    {
        $this->servers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add server
     *
     * @param \TestBundle\Entity\Server $server
     *
     * @return Logiciel
     */
    public function addServer(\TestBundle\Entity\Server $server)
    {
        $this->servers[] = $server;

        return $this;
    }

    /**
     * Remove server
     *
     * @param \TestBundle\Entity\Server $server
     */
    public function removeServer(\TestBundle\Entity\Server $server)
    {
        $this->servers->removeElement($server);
    }

    /**
     * Get servers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServers()
    {
        return $this->servers;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Logiciel
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set etatLogiciel
     *
     * @param string $etatLogiciel
     *
     * @return Logiciel
     */
    public function setEtatLogiciel($etatLogiciel)
    {
        $this->etatLogiciel = $etatLogiciel;

        return $this;
    }

    /**
     * Get etatLogiciel
     *
     * @return string
     */
    public function getEtatLogiciel()
    {
        return $this->etatLogiciel;
    }
}
