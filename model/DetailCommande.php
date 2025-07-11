<?php

declare(strict_types=1);

class DetailCommande
{

    private int $id;
    private int $idProduit;
    private int $idCommande;
    private int $quantite;
    private float $prixTotal;
    private string $nomProduit;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdProduit(): int
    {
        return $this->idProduit;
    }

    public function setIdProduit(int $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdCommande(): int
    {
        return $this->idCommande;
    }


    public function setIdCommande(int $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }


    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixTotal(): float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }


    public function getNomProduit(): string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }
}
