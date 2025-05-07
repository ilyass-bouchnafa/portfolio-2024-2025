#include <stdio.h>
#include <stdlib.h>
#include "pile.h"


int menu() {
    printf ("\n\n GESTION D'UNE PILE DE PERSONNE \n\n");
    printf ("0 - Fin\n");
    printf ("1 - empiler trois personnes \n");
    printf ("2 - afficher le contenue de la pile \n");
    printf ("3 - dépiler un élément \n");
    printf ("\n");
    printf ("Votre choix ? ");
    int cod; scanf ("%d", &cod); getchar();
    printf ("\n");
    return cod;
}

int main() {
    booleen fini = faux;
    Pile* p = creerPile(0,ecrirePersonne,comparerPersonne);
    ch15 nom;
    ch15 prenom;
    while (!fini) {
        switch (menu()) {
            case 0 : {
                fini = vrai;
                printf("Fin du programme");
                break;
            }
            case 1 : {
                int i;
                for (i=1; i <= 3; i++) {
                    printf("Entrer le nom %d : ",i);
                    scanf("%s", nom);
                    printf("Entrer un prenom %d : ",i);
                    scanf("%s", prenom);
                    Personne* personne = creerPersonne(nom, prenom);
                    empiler(p, personne);
                }
                break;
            }
            case 2 : {
                if (PileVide(p))
                    printf("La pile est vide");
                else
                    listerPile(p);
                break;
            }
            case 3 : {
                if (PileVide(p))
                    printf("La pile est vide");
                else {
                    Personne* extrait = depiler(p);
                    printf("La personne extrait : %s %s",extrait->nom, extrait->prenom);
                }
                break;
            }
        }
    }
}

