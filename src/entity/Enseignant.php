<?php

namespace App\Exeptions\entity;

use \DateTime;

/**
 * 
 * Enseignant, hérité de personne
 */
class Enseignant extends Personne
{
    private $coursDonnés = [];
    private $entreeEnService;
    private $anciennete;


    public function setCoursDonnés($coursDonnés)
    {
        $this->coursDonnés[] .= $coursDonnés;
    }

    public function getCoursDonnés()
    {
        echo "<ul>";
        foreach ($this->coursDonnés as $cours) {
            echo "<li>" . $cours . "</li>";
        };
        echo "</ul>";
    }

    public function setEntreeEnService($entreeEnService)
    {
        $dateEntree = new \DateTime($entreeEnService);
        // formatage date en jour mois année
        $this->entreeEnService = $dateEntree->format('d-m-Y');
    }

    public function getEntreeEnService()
    {
        return $this->entreeEnService;
    }

    public function getAnciennete()
    {
        $AnneeEntree = new \DateTime($this->entreeEnService);
        $AnneeEntree = $AnneeEntree->format("Y");
        // année actuelle 
        $currentYear = date("Y");
        return $currentYear - $AnneeEntree;
    }
};
