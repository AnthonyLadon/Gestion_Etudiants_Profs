<?php

require "vendor/autoload.php";


use App\Exeptions\entity\Etudiant;
use App\Exeptions\entity\Personne;
use App\Exeptions\entity\Enseignant;
use App\Exeptions\entity\EntityManager;

// require "src/entity/EntityManager.php";


// connexion base de données
try {
    $connexionDb = new PDO(
        'mysql:host=localhost;dbname=poo_php',
        'root',
        'root'
    );
} catch (Exception $exc) {
    die('Erreur : ' . $exc->getMessage());
}




echo "<h1>Liste d'étudiants: </h1>";

// CREATION DE L'ETUDIANT
$student1 = new Etudiant('Marley', 'Bob', 'rue de des rastas 34', '3000', 'Kingston', 'Jamaique', 'Rasta-music');


// AJOUT DES ATTRIBUTS
$student1->setCoursSuivi("Javascript");
$student1->setCoursSuivi("React");
$student1->setCoursSuivi("php");
$student1->setCoursSuivi("symfony");
$student1->setNiveau(3);
$student1->setDateInscription("10-09-2020");

// AFFICHAGE DE L'ETUDIANT
echo $student1;
echo "<br><h4>Cours suivis: </h4>";
$student1->getCoursSuivi();
echo "<br>Niveau: " . $student1->getNiveau();
echo "<br>Date d'inscription: " . $student1->getDateInscription();


// ENSEIGNANTS

echo "<br><br><h1>Liste d'enseignants: </h1>";

// CREATION DE L'ENSEIGNANT
$prof1 = new Enseignant('Jesaitout', 'Jean', 'rue de la connaissance 45', '4000', 'Liege', 'Belgique', 'Ecole sainte veronique');


// ATTRIBUTS
$prof1->setCoursDonnés("Javascript");
$prof1->setCoursDonnés("React");
$prof1->setEntreeEnService("23-09-1999");

//AFFICHAGE PROF
echo $prof1 . "<br>Cours Donnés: ";
$prof1->getCoursDonnés();

echo "<br>Date d'entrèe en service: " . $prof1->getEntreeEnService();
echo "<br>Ancienneté: " . $prof1->getAnciennete() . "an" . ($prof1->getAnciennete() > 1 ? "s" : "");

// AFFICHAGE PERSONNES RECUP DEPUIS LA BD
echo "<br><h1>Personnes récupérées dans la DB:</h1>";

$personneRecup = new EntityManager($connexionDb);
$personneRecuperee = $personneRecup->readAll();

foreach ($personneRecuperee as $personne) {
    echo $personne . "<br>";
}
