#include <stdio.h>
#include <stdlib.h>
#include "liste.h"


int menu () {
    printf ("\n\nGESTION D'UNE LISTE DE PERSONNES\n\n");
    printf ("0 - Fin\n");
    printf ("1 - Insertion en tête de liste\n");
    printf ("2 - Insertion en fin de liste\n");
    printf ("3 - Retrait en tête de liste\n");
    printf ("4 - Retrait en fin de liste\n");
    printf ("5 - Retrait d'un élément à partir de son nom\n");
    printf ("6 - Parcours de la liste\n");
    printf ("7 - Recherche d'un élément à partir de son nom\n");
    printf ("8 - Destruction de la liste\n");
    printf ("\n");
    printf ("Votre choix ? ");
    int cod; scanf ("%d", &cod);
    printf ("\n");
    return cod;
}

int main() {
    Liste* lp = creerListe(0, ecrirePersonne, comparerPersonne);
    booleen fini = faux;

    while (!fini) {
        switch(menu()) {
            case 0 : {
                fini = vrai;
                break;
            }
            case 1 : {
                ch15 nom;
                ch15 prenom;
                printf("Entrer le nom du personne : ");
                scanf("%s",nom);
                printf("Entrer le prenom du personne : ");
                scanf("%s",prenom);
                Personne* nouveau = creerPersonne(nom,prenom);
                insererEnTeteDeListe(lp,nouveau);
                break;
            }
            case 2 : {
                ch15 nom;
                ch15 prenom;
                printf("Entrer le nom du personne : ");
                scanf("%s",nom);
                printf("Entrer le prenom du personne : ");
                scanf("%s",prenom);
                Personne* nouveau = creerPersonne(nom,prenom);
                insererEnFinDeListe(lp,nouveau);
                break;
            }
            case 3 : {
                if (!listeVide(lp)) {
                    Personne* extrait = (Personne*)extraireEnTeteDeListe(lp);
                    printf("%s %s est extrait de la liste",extrait->nom,extrait->prenom);
                }
                else {
                    printf("La liste est vide");
                }
                break;
            }
            case 4 : {
                if (!listeVide(lp)) {
                    Personne* extrait = (Personne*)extraireEnFinDeListe(lp);
                    printf("%s %s est extrait de la liste",extrait->nom,extrait->prenom);
                }
                else {
                    printf("La liste est vide");
                }
                break;
            }
            case 5 : {
                ch15 nom;
                printf("Entrer le nom a extraire : ");
                scanf("%s",nom);
                Objet* p = (Objet*)creerPersonne(nom,"?");
                Personne* nomChercher = (Personne*)chercherUnObjet(lp,p);
                if(extraireUnObjet(lp,(Objet*)nomChercher)) {
                    printf("%s %s est extrait dans la liste",nomChercher->nom,nomChercher->prenom);
                }
                break;
            }
            case 6 : {
                if (listeVide(lp))
                    printf("La liste est vide");
                else
                    listerListe(lp);
                break;
            }

            case 7 : {
                ch15 nom;
                printf("Entrer le nom a chercher : ");
                scanf("%s",nom);
                Personne* p = creerPersonne(nom,"?");
                Objet* nomChercher = (Objet*) p;
                Personne* nomChercherTrouver = (Personne*)chercherUnObjet(lp,nomChercher);
                if (nomChercherTrouver) {
                    printf("%s %s est bien dans la liste",nomChercherTrouver->nom,nomChercherTrouver->prenom);
                }
                else
                    printf("Le nom est introuvable");
                break;
            }

            case 8 : {
                detruireListe(lp);
                break;
            }
        }
    }
    return 0;
}
