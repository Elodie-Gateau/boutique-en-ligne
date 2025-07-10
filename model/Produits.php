<?php

declare(strict_types=1);

class Produit
{

    private int $id;
    private string $nom;
    private float $prix;
    private string $description;
    private string $type;
    private string $url_img;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }


    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }


    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUrl_img()
    {
        return $this->url_img;
    }

    public function setUrl_img($url_img)
    {
        $this->url_img = $url_img;

        return $this;
    }
}
