<?php

declare(strict_types=1);

class Commande
{

    private int $id;
    private int $idUser;
    private float $total;
    private string $statut;
    private $dateCommande;

    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getIdUser(): int
    {
        return $this->idUser;
    }


    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }


    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }


    public function getDateCommande()
    {
        return $this->dateCommande;
    }


    public function setDateCommande($dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }
}
