#include <stdio.h>
#include <stdlib.h>
#include "liste.h"

//initialisation de la liste
void initListe(Liste* li, int type, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*)) {
    li->premier = NULL;
    li->dernier = NULL;
    li->courant = NULL;
    li->nbElt = 0;
    li->type = type;
    li->afficher = afficher;
    li->comparer = comparer;
}

//creation de la liste
Liste* creerListe(int type, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*)) {
    Liste* li = (Liste*)malloc(sizeof(Liste));
    initListe (li,type,afficher,comparer);
    return li;
}

//creation d'un element local
static Element* creerElement () {
    return (Element*)malloc(sizeof(Element));
}

//inserer un element en tete de la liste
void insererEnTeteDeListe (Liste* li, Objet* objet) {
    Element* nouveau = creerElement();
    nouveau->reference = objet;
    nouveau->suivant = li->premier;
    li->premier = nouveau;
    if (li->dernier == NULL)
        li->dernier = nouveau;
    li->nbElt++;
}
//inserer un element apres l'element precedent de la liste
static void insererApres(Liste* li, Element* precedent, Objet* objet) {
    if (precedent == NULL) {
        insererEnTeteDeListe(li,objet);
    }
    else {
        Element* nouveau = creerElement();
        nouveau->reference = objet;
        nouveau->suivant = precedent->suivant;
        precedent->suivant = nouveau;
        if (precedent == li->dernier)
            li->dernier = nouveau;
        li->nbElt++;
    }
}
//inserer un element en fin de la liste
void insererEnFinDeListe(Liste* li, Objet* objet) {
    insererApres(li,li->dernier,objet);
}
booleen listeVide(Liste* li) {
    return li->nbElt == 0;
}
//retrait d'un objet en tete de la liste
Objet* extraireEnTeteDeListe(Liste* li) {
    Element* extrait = li->premier;
    if (!listeVide(li)) {
        li->premier = li->premier->suivant;
        if (li->premier == NULL) {
            li->dernier = NULL;
        }
    }
    li->nbElt--;
    return extrait != NULL ? extrait->reference : NULL;
}
//retrait d'un objet apres l'element precedent de la liste (fonction local)
static Objet* extraireApres(Liste* li, Element* precedent) {
    if (precedent == NULL) {
        return extraireEnTeteDeListe(li);
    }
    else {
        Element* extrait = precedent->suivant ;
        if (extrait != NULL) {
            precedent->suivant = extrait->suivant ;
            if (extrait == li->dernier)
                li->dernier = precedent;
            li->nbElt--;
        }
        return extrait != NULL ? extrait->reference : NULL;
    }
}

//retrait d'un objet de la fin de la liste
Objet* extraireEnFinDeListe(Liste* li) {
    Objet* extrait;
    if (listeVide(li)) {
        extrait = NULL;
    }
    else if (li->premier == li->dernier) {
        extrait = extraireEnTeteDeListe(li);
    }
    else {
        Element* ptc = li->premier;
        while (ptc->suivant != li->dernier)
            ptc = ptc->suivant;
        extrait = extraireApres(li,ptc);
    }
    return extrait;
}
//ouvrir une liste (c'est a dire se positionner sur le premier de la liste)
void ouvrirListe(Liste* li) {
    li->courant = li->premier;
}

//Savoir si on a atteint la fin de la liste
booleen finListe(Liste* li) {
    return li->courant == NULL;
}

//pointe sur l'element courant de la liste et se positionner sur l'element courant suivant
static Element* elementCourant(Liste* li) {
    Element *ptc = li->courant;
    if (li->courant != NULL) {
        li->courant = li->courant->suivant;
    }
    return ptc;
}

//pointe sur l'objet courant dans la liste
Objet* objetCourant(Liste* li) {
    Element* ptc = elementCourant(li);
    return ptc == NULL ? NULL : ptc->reference;
}

//extraire d'un objet
booleen extraireUnObjet(Liste* li, Objet* objet) {
    Element* precedent = NULL;
    Element* ptc = NULL;
    booleen trouve = faux;
    ouvrirListe(li);
    while (!finListe(li) && !trouve) {
        precedent = ptc;
        ptc = elementCourant(li);
        trouve = (ptc->reference == objet) ? vrai : faux;
    }
    if (!trouve)
        return faux;
    Objet* extrait = extraireApres(li,precedent);
    return vrai;
}
//parcourir une liste
void listerListe(Liste* li) {
    ouvrirListe(li);
    while(!finListe(li)) {
        Objet* objet = objetCourant(li);
        printf("%s\t",li->afficher(objet));
    }

}

//chercher un objet dans la liste
Objet* chercherUnObjet(Liste* li, Objet* objetChercher) {
    Objet* objet;
    booleen trouve = faux;
    ouvrirListe(li);
    while (!finListe(li) && !trouve) {
        objet = objetCourant(li);
        trouve = li->comparer(objetChercher, objet) == 0;
    }
    return trouve ? objet : NULL;
}

//detruire une liste
void detruireListe(Liste* li) {
    ouvrirListe(li);
    while(!finListe(li)) {
        Element* ptc = elementCourant(li);
        free(ptc);
    }
    initListe(li,0,NULL,NULL);
}
