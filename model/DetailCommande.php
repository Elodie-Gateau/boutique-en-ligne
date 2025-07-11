<?php

declare(strict_types=1);

class DetailCommande extends Commande
{

    private int $id;
    private int $idProduit;
    private int $idCommande;
    private int $quantite;
    private float $prixTotal;
    private string $nomProduit;
    private float $prixUnitaireProduit;
    private string $DescriptionProduit;


    public function getIdDetail(): int
    {
        return $this->id;
    }

    public function setIdDetail(int $id): self
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


    public function getPrixUnitaireProduit()
    {
        return $this->prixUnitaireProduit;
    }

    public function setPrixUnitaireProduit($prixUnitaireProduit)
    {
        $this->prixUnitaireProduit = $prixUnitaireProduit;

        return $this;
    }


    public function getDescriptionProduit()
    {
        return $this->DescriptionProduit;
    }


    public function setDescriptionProduit($DescriptionProduit)
    {
        $this->DescriptionProduit = $DescriptionProduit;

        return $this;
    }
}
