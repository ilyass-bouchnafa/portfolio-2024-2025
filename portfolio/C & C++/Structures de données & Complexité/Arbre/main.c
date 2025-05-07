#include <stdio.h>
#include <stdlib.h>
#include "arbre.h"



int menu () {
    printf ("\n\n GESTION D'ARBRES \n\n");
    printf ("\n\n ARBRES BINAIRES \n\n");
    printf (" 0 - Fin du programme\n");
    printf ("\n");
    printf (" 1 - Creation de l'arbre genealogique\n");
    printf (" 2 - Creation de l'arbre de l'expression arithmetique\n");
    printf ("\n");
    printf (" 3 - Parcours prefixe\n");
    printf (" 4 - Parcours infixe\n");
    printf (" 5 - Parcours postfixe\n");
    printf (" 6 – Trouver Noeud \n");
    printf (" 7 - Taille \n");
    printf (" 8 - Hauteur \n");
    printf (" 9 - Parcours en Largeur \n");
    printf ("\n");
    printf ("Votre choix ? ");
    int cod; scanf ("%d", &cod); getchar();
    printf ("\n");
    return cod;
}

int main() {
    Arbre* arbre;
    Noeud* racine;
    booleen fini = faux;

    while(!fini) {
        switch(menu()) {
            case 0 : {
                fini = vrai;
                printf("Fin de programme");
                break;
            }

            case 1 : {
                racine =
                  cNd("Samir",
                    cNd("Kamal",
                        cNd("Yassine",
                            NULL,
                            cNd("Hind", NULL, cF("Yasmine"))
                            ),
                            cNd("Sarah", cF("Karim"), NULL)
                        ),

                     NULL
                    );
                arbre = creerArbre(racine, afficherChar, NULL);
                printf("L'arbre genealogique est bien cree");
                break;
            }
            case 2 : {
                racine = cNd("-",
                             cNd("*",
                                 cNd("+",cF("a"),cF("b")),
                                 cNd("-",cF("c"),cF("d"))
                             ),
                          cF("e"));
                arbre = creerArbre(racine, afficherChar, NULL);
                printf("L'arbre arithmetique est bien cree");
                break;
            }
            case 3 : {
                printf("Prefixe : ");
                Prefixe(racine, afficherChar);
                break;
            }
            case 4 : {
                printf("Infixe : ");
                Infixe(racine, afficherChar);
                break;
            }
            case 5 : {
                printf("Postfixe : ");
                Postfixe(racine, afficherChar);
                break;
            }
            case 6 : {
                char* trouve = (char*)malloc(sizeof(char));
                printf("Entrer le noeud a chercher : ");
                scanf("%s",trouve);
                Noeud* result = trouverNoeud(racine, trouve, comparer);
                if (result)
                    printf("%s est trouve dans l'arbre \n",trouve);
                else
                    printf("%s n'est pas trouve dans l'arbre \n",trouve);
                break;
            }
            case 7 : {
                int tailleArbre = taille(racine);
                printf("La taille de l'arbre est : %d",tailleArbre);
                break;
            }
            case 8 : {
                int hauteurArbre = hauteur(racine);
                printf("La hauteur de l'arbre est : %d",hauteurArbre);
                break;
            }
            case 9 : {
                printf("Le parcours en largeur de l'arbre est : \n");
                enLargeur(racine, afficherChar);
                break;
            }

        }
    }
    return 0;
}
