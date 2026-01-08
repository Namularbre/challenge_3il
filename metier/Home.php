<?php

class Home {
    private int $id;
    private string $titre;
    private string $description;
    private string $img;

    /**
     * Création d'un produit
     */
    public function __construct($tab) {
        if (!empty($tab)) {
            $this->hydrate($tab);
        }
    }

    /**
     * Hydration de l'objet en lui fournissant les données correspondant
     * à ses attributs
     */
    private function hydrate(array $tab) {

        foreach ($tab as $key => $value) {

            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }
}