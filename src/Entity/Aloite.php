<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AloiteRepository")
 */
class Aloite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aihe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kuvaus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kirjauspvm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etunimi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sukunimi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function setKirjauspvm(\DateTimeInterface $args) {
        $this->kirjauspvm = $args;
    }
    public function getKirjauspvm() {
        return $this->kirjauspvm;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAihe(): ?string
    {
        return $this->aihe;
    }

    public function setAihe(string $aihe): self
    {
        $this->aihe = $aihe;

        return $this;
    }

    public function getKuvaus(): ?string
    {
        return $this->kuvaus;
    }

    public function setKuvaus(string $kuvaus): self
    {
        $this->kuvaus = $kuvaus;

        return $this;
    }

    public function getKirjauspvm(): ?string
    {
        return $this->kirjauspvm;
    }

    public function setKirjauspvm(string $kirjauspvm): self
    {
        $this->kirjauspvm = $kirjauspvm;

        return $this;
    }

    public function getEtunimi(): ?string
    {
        return $this->etunimi;
    }

    public function setEtunimi(string $etunimi): self
    {
        $this->etunimi = $etunimi;

        return $this;
    }

    public function getSukunimi(): ?string
    {
        return $this->sukunimi;
    }

    public function setSukunimi(string $sukunimi): self
    {
        $this->sukunimi = $sukunimi;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
