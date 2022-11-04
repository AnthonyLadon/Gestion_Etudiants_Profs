<?php

namespace App\Exeptions\entity;

use App\Exeptions\entity\Personne;


/**
 * 
 * Etudiant, hérité de personne
 */
class Etudiant extends Personne
{

    private $coursSuivi = [];
    private $niveau;
    private $dateInscription;


    public function setCoursSuivi($coursSuivi)
    {
        $this->coursSuivi[] .= $coursSuivi;
    }

    public function getCoursSuivi()
    {
        echo "<ul>";
        foreach ($this->coursSuivi as $cours) {
            echo "<li>" . $cours . "</li>";
        };
        echo "</ul>";
    }

    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function setDateInscription($dateInscription)
    {
        $date = new \dateTime($dateInscription);
        $this->dateInscription = $date->format('d-m-Y');
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }
};
