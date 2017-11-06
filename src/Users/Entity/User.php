<?php

namespace App\Users\Entity;
use tp1\src\Users\Repository;
class User
{
    protected $id;

    protected $nom;

    protected $prenom;

    protected $listjoueur;

  /*  public function __construct($id, $nom, $prenom, $listjoueur)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->listjoueur = $listjoueur;
    }*/

    public function __construct($id, $nom, $prenom)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        //$listjoueur =$users = $app['repository.user']->getPlayer($id);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setListeJoueur($listjoueur)
    {
        $this->listjoueur = $listjoueur;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getListjoueur()
    {
        return $this->listjoueur;
    }



    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['prenom'] = $this->prenom;

        return $array;
    }
}
