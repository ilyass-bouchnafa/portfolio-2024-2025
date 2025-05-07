#include <stdio.h>>
#include <stdlib.h>
#include <string.h>
#include "arbre.h"
#include "liste.h"

//cree un noeud
Noeud* cNd(Objet* objet, Noeud* gauche, Noeud* droite) {
    Noeud* nouveau = (Noeud*)malloc(sizeof(Noeud));
    nouveau->reference = objet;
    nouveau->gauche = gauche;
    nouveau->droite = droite;
    return nouveau;
}

//cree une feuille
Noeud* cF(Objet* objet) {
    return cNd(objet, NULL, NULL);
}

//initialise une arbre
void initArbre(Arbre* arbre, Noeud* racine, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*)) {
    arbre->racine = racine;
    arbre->afficher = afficher;
    arbre->comparer = comparer;
}

//cree une arbre
Arbre* creerArbre(Noeud* racine, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*)) {
    Arbre* arbre = (Arbre*)malloc(sizeof(Arbre));
    initArbre(arbre, racine, afficher, comparer);
    return arbre;
}
//parcours prefixe d'une arbre
void Prefixe(Noeud* racine, char* (*afficher)(Objet*)) {
    if (racine != NULL) {
        printf("%s  ",afficher(racine->reference));
        Prefixe(racine->gauche, afficher);
        Prefixe(racine->droite, afficher);
    }
}

//parcours infixe d'une arbre
void Infixe(Noeud* racine, char* (*afficher)(Objet*)) {
    if (racine != NULL) {
        Infixe(racine->gauche, afficher);
        printf("%s  ",afficher(racine->reference));
        Infixe(racine->droite, afficher);
    }
}

//parcours postfixe d'une arbre
void Postfixe(Noeud* racine, char* (*afficher)(Objet*)) {
    if (racine != NULL) {
        Postfixe(racine->gauche, afficher);
        Postfixe(racine->droite, afficher);
        printf("%s  ",afficher(racine->reference));
    }
}
//afficher
char* afficherChar(Objet* objet) {
    return (char*) objet;
}
//comparer
int comparer(Objet* objet1, Objet* objet2) {
    char* p1 = (char*) objet1;
    char* p2 = (char*) objet2;
    return strcmp(p1, p2);
}
//trouver un noeud dans une arbre
Noeud* trouverNoeud(Noeud* racine, Objet* objet, int (*comparer)(Objet*, Objet*)) {
    Noeud* pNom;
    if (racine == NULL) {
        pNom = NULL;
    }
    else if (comparer(racine->reference, objet) == 0) {
        pNom = racine;
    }
    else {
        pNom = trouverNoeud(racine->gauche, objet, comparer);
        if (pNom == NULL)
            pNom = trouverNoeud(racine->droite, objet, comparer);
    }
    return pNom;
}
//taille d'une arbre
int taille(Noeud* racine) {
    if (racine == NULL) {
        return 0;
    }
    else {
        return 1 + taille(racine->gauche) + taille(racine->droite);
    }
}
//max
int max(int a, int b) {
    if (a > b)
        return a;
    else
        return b;
}
//hauteur d'une arbre
int hauteur(Noeud* racine) {
    if (racine == NULL) {
        return 0;
    }
    else {
        return 1 + max(hauteur(racine->gauche), hauteur(racine->droite));
    }
}
//parcours en largeur d'une arbre
void enLargeur(Noeud* racine, char* (*afficherChar)(Objet*)) {
    Liste* li = creerListe(0, afficherChar, comparer);
    insererEnTeteDeListe(li, racine);
    while (!listeVide(li)) {
        Noeud* extrait = (Noeud*) extraireEnTeteDeListe(li);
        printf("%s  ",afficherChar(extrait->reference));
        if (extrait->gauche != NULL)
            insererEnFinDeListe(li, extrait->gauche);
        if (extrait->droite != NULL)
            insererEnFinDeListe(li, extrait->droite);
    }
}
//verifier si un noeud est une feuille
booleen estFeuille (Noeud* racine) {
    return (racine->gauche == NULL) && (racine->droite == NULL);
}
//nombre de feuilles dans une arbre
int nbFeuilles (Noeud* racine) {
    if (racine == NULL) {
        return 0;
    }
    else if (estFeuille(racine)) {
        return 1;
    }
    else {
        return nbFeuilles (racine->gauche) + nbFeuilles(racine->droite);
    }
}
//afficher les feuilles d'une arbre
void listerFeuilles(Noeud* racine, char* (*afficher)(Objet*)) {
    if (racine != NULL) {
        if (estFeuille(racine)) {
            printf("%s ",afficher(racine->reference));
        }
        else {
            listerFeuilles(racine->gauche, afficher);
            listerFeuilles(racine->droite, afficher);
        }
    }
}

//verifier si 2 arbres sont égaux
booleen egaliteArbre(Noeud* racine1, Noeud* racine2, int (*comparer)(Objet*, Objet*)) {
    booleen resu = faux;
    if ((racine1 == NULL) && (racine2 == NULL)) {
        resu = vrai;
    }
    else if ((racine1 != NULL) && (racine2 != NULL)) {
        if (comparer(racine1->reference, racine2->reference) == 0) {
            if (egaliteArbre(racine1->gauche, racine2->gauche, comparer)) {
                resu = egaliteArbre(racine1->droite, racine2->droite, comparer);
            }
        }
    }
    return resu;
}









