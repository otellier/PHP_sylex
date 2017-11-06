<?php

namespace App\Footballer\Entity;

class Footballer
{
    protected $id;

    protected $poste;

    protected $nom;

    protected $prenom;

    protected $idmaster;

    public function __construct($id, $nom, $prenom, $poste, $idmaster)
    {
        $this->id = $id;
        $this->poste = $poste;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->idmaster = $idmaster;
    }

    public function setid($id)
    {
        $this->id = $id;
    }

    public function setidmaster($idmaster)
    {
        $this->idmaster = $idmaster;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setposte($poste)
    {
        $this->prenom = $prenom;
    }

    public function getid()
    {
        return $this->id;
    }
    public function getidmaster()
    {
        return $this->idmaster;
    }
    public function getPoste()
    {
        return $this->poste;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['prenom'] = $this->prenom;
        $array['poste'] = $this->poste;
        $array['idmaster'] = $this->idmaster;

        return $array;
    }
}
