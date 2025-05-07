#include "liste.h"
#include "personne.h"

typedef Liste Pile;

Pile* creerPile(int type, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*));
booleen PileVide(Pile* p);
void empiler(Pile* p, Objet* objet);
Objet* depiler(Pile* p);
void listerPile(Pile* p);
void detruirePile(Pile* p);
char* afficherPile(Objet* objet);


