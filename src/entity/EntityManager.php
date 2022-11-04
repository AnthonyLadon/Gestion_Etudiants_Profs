<?php

namespace App\Exeptions\entity;

use App\Exeptions\entity\Personne;

/**
 *PersonneManager
 *Gestion des personnes (CRUD, Faker)
 */

class EntityManager
{

    private $connexion;


    public function getConnexion()
    {
        return $this->connexion;
    }

    public function setConnexion($connexion)
    {
        $this->connexion = $connexion;
    }

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }


    public function insert(Personne $personne)
    {
        // préparation de la requete 
        $stmt = $this->getConnexion()->prepare(
            'INSERT INTO Faker SET nom=:nom, prenom=:prenom, Personne$personne=:Personne$personne, codePostal=:codePostal, ville=:ville, pays=:pays, societe=:societe'
        );

        // la methode bindValue lie les valeurs (':nom', valeur)
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getAdresse());
        $stmt->bindValue(':codePostal', $personne->getCodePostal());
        $stmt->bindValue(':ville', $personne->getVille());
        $stmt->bindValue(':pays', $personne->getpays());
        $stmt->bindValue(':societe', $personne->getSociete());

        // Execution de la requete
        $stmt->execute();
    }


    public function readAll()
    {
        $personnes = [];

        // la methode query 
        $query = $this->getConnexion()->query(
            "SELECT * FROM Faker"
        );

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $personnes[] = new Personne(
                nom: $data['nom'],
                prenom: $data['prenom'],
                adresse: $data['adresse'],
                codePostal: $data['codePostal'],
                ville: $data['ville'],
                pays: $data['pays'],
                societe: $data['societe']
            );
        }

        return $personnes;
    }


    public function readById($id)
    {
        $id = (int) $id;

        // REQUETE SQL
        $query = $this->getConnexion()->query(
            'SELECT id, nom, prenom
            FROM Faker 
            WHERE id = ' . $id
        );


        /* 
						PDO::FETCH_ASSOC: retourne un tableau associatif 
            nom de champ => resultat 
				*/

        $datas = $query->fetch(\PDO::FETCH_ASSOC);

        // CREATION ET RENVOI DE LA PERSONNE

        return new Personne(
            $datas["nom"],
            $datas["prenom"],
            $datas["adresse"],
            $datas["codePostal"],
            $datas["ville"],
            $datas["pays"],
            $datas["societe"]
        );
    }


    public function update($id, Personne $personne)
    {
        $stmt = $this->getConnexion()->prepare(
            'UPDATE Faker SET nom=:nom, prenom=:prenom, Personne$personne=:Personne$personne, codePostal=:codePostal, ville=:ville, pays=:pays, societe=:societe'
        );

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getAdresse());
        $stmt->bindValue(':codePostal', $personne->getCodePostal());
        $stmt->bindValue(':ville', $personne->getVille());
        $stmt->bindValue(':pays', $personne->getpays());
        $stmt->bindValue(':societe', $personne->getSociete());

        $stmt->execute();
    }


    public function delete($id)
    {
        $this->getConnexion()->exec('DELETE FROM Faker WHERE id=' . $id);
    }
}
