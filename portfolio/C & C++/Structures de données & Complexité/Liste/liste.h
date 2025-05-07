
typedef int  booleen;
typedef void Objet;

#define faux   0
#define vrai   1
#define NONORDONNE  0
#define CROISSANT   1
#define DECROISSANT 2

// un élément de la liste
typedef struct element {
  Objet*          reference;
  struct element* suivant;
} Element;

// le type Liste
typedef struct {
  Element* premier;
  Element* dernier;
  Element* courant;
  int      nbElt;
  int      type;    // 0:simple, 1:croissant, 2:décroissant
  char*    (*afficher) (Objet*);
  int      (*comparer) (Objet*, Objet*);
} Liste;

void     initListe              (Liste* li, int type, char* (*afficher) (Objet*), int (*comparer) (Objet*, Objet*) );
Liste*   creerListe             (int type, char* (*afficher) (Objet*), int (*comparer) (Objet*, Objet*) );

booleen  listeVide              (Liste* li);
int      nbElement              (Liste* li);

void     insererEnTeteDeListe   (Liste* li, Objet* objet);