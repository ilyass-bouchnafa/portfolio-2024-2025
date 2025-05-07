typedef int booleen;
typedef void Objet;

#define faux   0
#define vrai   1
#define NONORDONNE  0
#define CROISSANT   1
#define DECROISSANT 2


typedef struct element {
    Objet*          reference;
    struct element* suivant;
} Element;


typedef struct {
    Element* premier;
    Element* dernier;
    Element* courant;
    int      nbElt;
    int      type;
    char*    (*afficher) (Objet*);
    int      (*comparer) (Objet*, Objet*);
} Liste;


void initListe(Liste* li, int type, char* (*afficher) (Objet*), int (*comparer) (Objet*, Objet*) );
Liste* creerListe(int type, char* (*afficher) (Objet*), int (*comparer) (Objet*, Objet*) );

booleen listeVide(Liste* li);
int nbElement(Liste* li);

void insererEnTeteDeListe(Liste* li, Objet* objet);
void insererApres(Liste* li, Element* precedent, Objet* objet);
void insererEnFinDeListe(Liste* li, Objet* objet);
Objet* extraireEnTeteDeListe(Liste* li);
Objet* extraireEnFinDeListe(Liste* li);
void ouvrirListe(Liste* li);
booleen finListe(Liste* li);
Objet* objetCourant(Liste* li);
booleen extraireUnObjet(Liste* li, Objet* objet);
void listerListe(Liste* li);
Objet* chercherUnObjet(Liste* li, Objet* objetChercher);
void detruireListe(Liste* li);

