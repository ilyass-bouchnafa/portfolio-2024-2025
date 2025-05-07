typedef void Objet;

typedef int booleen;
#define faux   0
#define vrai   1

typedef struct noeud {
    Objet* reference;
    struct noeud* gauche;
    struct noeud* droite;

} Noeud;

typedef struct {
    Noeud* racine;
    char* (*afficher)(Objet*);
    int (*comparer)(Objet*, Objet*);
} Arbre;

Noeud* cNd(Objet* objet, Noeud* gauche, Noeud* droite);
Noeud* cF(Objet* objet);
void initArbre(Arbre* arbre, Noeud* racine, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*));
Arbre* creerArbre(Noeud* racine, char* (*afficher)(Objet*), int (*comparer)(Objet*, Objet*));
void Prefixe(Noeud* racine, char* (*afficher)(Objet*));
void Infixe(Noeud* racine, char* (*afficher)(Objet*));
void Postfixe(Noeud* racine, char* (*afficher)(Objet*));
char* afficherChar(Objet* objet);
int comparer(Objet* objet1, Objet* objet2);
Noeud* trouverNoeud (Noeud* racine, Objet* objet, int (*comparer)(Objet*, Objet*));
int taille (Noeud* racine);
int hauteur(Noeud* racine);
void enLargeur (Noeud* racine, char* (*afficher)(Objet*));
booleen estFeuille(Noeud* racine);
int nbFeuilles (Noeud* racine);
void listerFeuilles(Noeud* racine, char* (*afficher)(Objet*));
booleen egaliteArbre (Noeud* racine1, Noeud* racine2, int (*comparer)(Objet*, Objet*));




