# apiMSPR
 
Api pour MSPR veuillez payer 25 euros d'utilisations(c pas vrais)

L'url de base est "http://reader-saga.com" et ne renvoie rien

Pour les proprietaires :
- rajoutez "/proprietaire" pour la connexion (c'est possible avec POST et GET)
  - les données à envoyer sont "email" et "mdp" (c aussi le nom des clés)
  - accessible en POST ou GET
- rajoutez "/proprietaire/new" pour la création de compte
  - les données à envoyer sont "name", "lastname", "email", "mdp", "phone" (c aussi le nom des clés)
  - accessible en POST
- rajoutez "/proprietaire/newPlant" pour l'ajout de plante
  - les données à envoyer sont "proprietaire" (contenant l'id du proprietaire), "photo" de la plante, "nom" (de la plante), "nom_latin" (de la plante) (c aussi le nom des clés)
  - accessible en POST
- rajoutez "/proprietaire/postEntretien" pour l'ajout d'un entretien
  - accessible en POST
  - les données à envoyer sont "proprietaire" (contenant l'id du proprietaire), "plante" (contenant l'id de la plante), "title" ou titre de l'entretien, "content" pour le corp de l'entretien, "photo"

Pour les botanistes :
- rajoutez "/botaniste" pour la connexion (c'est possible avec POST et GET)
  - les données à envoyer sont "email" et "mdp" (c aussi le nom des clés)
  - accessible en POST ou GET
- rajoutez "/botaniste/new" pour la création de compte
  - accessible en POST
  - les données à envoyer sont "name", "lastname", "email", "mdp", "phone" (c aussi le nom des clés)
- rajoutez "/botaniste/comment" pour l'ajout de commentaire
  - les données à envoyer sont "auteur" (contenant l'id du botaniste), "plante" (contenant l'id de la plante), "commentaire" (ce sont aussi des clés)
  - accessible en POST