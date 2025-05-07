#include <stdio.h>
#include <stdlib.h>
#include "graphemat.h"

int menu () {
    printf ("\n\n GESTION DE GRAPHES \n\n");
    printf (" 0 - Fin du programme\n");
    printf ("\n");
    printf (" 1 - Creation du graphe\n");
    printf (" 2 - Detruire le graphe\n");
    printf (" 3 - Ajouter un sommet\n");
    printf (" 4 - Ajouter un arc\n");
    printf (" 5 - Ecrire un graphe\n");
    printf (" 6 - Parcours en profondeur \n");
    printf ("\n");
    printf ("Votre choix ? ");
    int cod; scanf ("%d", &cod); getchar();
    printf ("\n");
    return cod;
}

int main() {
   booleen fini = faux;
   GrapheMat* graphe;
   while (!fini) {
        switch(menu()) {
            case 0: {
                fini = vrai;
                break;
            }
            case 1: {
                int nMax;
                printf("Saisir le nombre maximal : ");
                scanf("%d",&nMax);
                graphe = creerGrapheMat(nMax, 1);
                break;
            }
            case 2: {
                detruireGraphe(graphe);
                printf("L'arbre est detruite");
                break;
            }
            case 3: {
                NomSom nom;
                printf("Entrez le nom du sommet : ");
                scanf("%s",&nom);
                ajouterUnSommet(graphe, nom);
                break;
            }
            case 4: {
                NomSom somD, somA;
                int cout;
                printf("Entrez le premier sommet : ");
                scanf("%s",&somD);
                printf("Entrer le deuxieme sommet : ");
                scanf("%s",&somA);
                printf("Entrez le cout : ");
                scanf("%d",&cout);
                ajouterUnArc(graphe, somD, somA, cout);
                break;
            }
            case 5: {
                ecrireGraphe(graphe);
                break;
            }
            case 6: {
                parcoursProfond(graphe);
                break;
            }
        }
   }
    return 0;
}
