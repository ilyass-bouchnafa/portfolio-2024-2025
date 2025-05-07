#include <stdio.h>
#include <stdlib.h>
#include "pile.h"



Pile* creerPile(int type, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*)) {
    return creerListe(0,afficher,comparer);
}
booleen PileVide(Pile* p) {
    return listeVide(p);
}
void empiler(Pile* p, Objet* objet) {
    insererEnTeteDeListe(p, objet);
}
Objet* depiler(Pile* p) {
    if (PileVide(p)) {
        return NULL;
    }
    else {
        return extraireEnTeteDeListe(p);
    }
}
void listerPile(Pile* p) {
    listerListe(p);
}
void detruirePile(Pile* p) {
    detruireListe(p);
}

char* afficherPile(Objet* objet) {
    ecrirePersonne(objet);
}


