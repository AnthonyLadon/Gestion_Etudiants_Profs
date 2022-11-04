EXERCICE:


Etendre la classe Personne avec 2 classes filles:

•ISL\Entity\Etudiant
qui comportera les propriétés supplémentaires suivantes:

  •Cours Suivis (array)
  •Niveau (string)  
  •date d’inscription (DateTime)
  
•ISL\Entity\Enseignant
  qui comportera les propriétés supplémentaires suivantes:
    •Cours Donnés (array)
    •Entrée en service (DateTime)
    •Ancienneté (int)
    
•Créez une classe ISL\Entity\EntityManager qui comprendra les méthodes communes à la gestion de toutes les entités
•Créez des classes filles de l’entity manager de sorte à pouvoir gérer les spécificités de Etudiant et Enseignant
