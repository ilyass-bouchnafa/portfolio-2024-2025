#include <stdio.h>
#include <stdlib.h>
#include "liste.h"
#include "liste.c"


int menu () {
    printf ("\n\n GESTION D'UNE LISTE D'ENTIERS \n\n");
    printf ("1 - Creer une liste\n");
    printf ("2 - Insertion  en tete de liste \n");
    printf ("3 - Insertion  en fin de liste \n");
    printf ("4 - Retrait en tete de liste \n");
    printf ("5 - Retrait en fin de liste \n");
    printf ("6 - Retrait d’un objet a partir de sa reference\n");
    printf ("7 - Afficher les  objets de la liste \n");
    printf ("8 - Chercher Un objet \n");
    printf ("9 - Destruction de la liste \n");
    printf ("10 - Fin\n");
    printf ("\n");
    printf ("Votre choix ? ");
    int cod; scanf ("%d", &cod); getchar();
    printf ("\n");
    return cod;
}
int main()
{
    Liste* li = (Liste*)malloc(sizeof(Liste));
    booleen fini = faux;
    while(!fini) {
        switch (menu()) {
            case 1 :
                li = creerListe(0,afficherEntier,comparerInt) ;
                printf("Vous avez cree une liste");
                break;
            case 2 : {
                int *a = (int*)malloc(sizeof(int));
                printf("Entrer l'entier a inserer : ");
                scanf("%d",a);
                insererEnTeteDeListe(li,a);
                break;
            }
            case 3 : {
                int *b = (int*)malloc(sizeof(int));
                printf("Entrer l'entier a inserer : ");
                scanf("%d",b);
                insererEnFinDeListe(li,b);
                break;
            }
            case 4 : {
                int *c = (int*)extraireEnTeteDeListe(li);
                printf("L'entier extrait en tete de liste est : %d",*c);
                break;
            }
            case 5 : {
                int* d = (int*)extraireEnFinDeListe(li);
                printf("L'entier extrait en fin de liste est : %d",*d);
                break;
            }
            case 6 : {
                int* extrait = (int*)malloc(sizeof(int));
                printf("Entrer l'entier a extraire : ");
                scanf("%d",extrait);
                int* chercheEntier = chercherUnObjet(li, extrait);
                if (chercheEntier) {
                    extraireUnObjet(li, chercheEntier);
                    printf("L'entier %d est extrait de la liste",*chercheEntier);
                }
                else {
                    printf("L'objet n'existe pas");
                }
                break;
            }
            case 7 : {
                if(!listeVide(li))
                    listerListe(li);
                else
                    printf("La liste est vide");
                break;
            }
            case 8 : {
                int* f = (int*)malloc(sizeof(int));
                printf("Entrer l'entier chercher : ");
                scanf("%d",f);
                if (chercherUnObjet(li,f) != NULL) {
                    printf("L'objet est bien trouver");
                }
                else {
                    printf("L'objet n'existe pas dans la liste");
                }
                break;
            }
            case 9 : {
                detruireListe(li);
                printf("La liste est bien detruit");
                break;
            }
            case 10 : {
                printf("Les maximum est : %d",chercherMax(li));
            }
            case 11 :
                fini = vrai;
                break;

        }
    }
}
