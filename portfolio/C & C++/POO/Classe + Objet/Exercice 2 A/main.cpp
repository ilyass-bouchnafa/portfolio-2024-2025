#include <iostream>
#include <cmath>
#include <stdlib.h>

using namespace std;

class complexe {
    float px;
    float py;
    public :
        complexe();
        complexe(float, float);
        ~complexe();
        void afficher();
        void modifier(float, float);
        complexe somme(complexe &);
        complexe& maxi(complexe &);

        //complexe remplirTab(float, float); // ? On crée une nouvelle méthode pour remplir notre tableau
};

complexe::complexe() {
    px = 0;
    py = 0;
}

complexe::complexe(float x, float y) {
    px = x;
    py = y;
}

complexe::~complexe() {
    //cout << "Destruction du nombre complexe : (" << px << ") + (" << py << "i)" << endl;
}

void complexe::afficher() {
    cout << "(" << px << ") + (" << py << "i)" << endl;

}

void complexe::modifier(float a, float b) {
    px = a;
    py = b;
}

complexe complexe::somme(complexe &c) {
    complexe z;
    z.px = px + c.px;
    z.py = py + c.py;
    return z;
}

complexe& complexe::maxi(complexe &a) { //L'objet original est utilisé sans etres copié
    float m1, m2;
    m1 = sqrt(pow(px,2)+pow(py,2));
    m2 = sqrt(pow(a.px,2)+pow(a.py,2));
    if (m1 >= m2) {
        return *this; //Si on fait complexe(px,py) on crée un nouvel objet temporaire qui sera détruite après l'execution de la fonction. Mais la fonction est censée de retourner une référence (complexe&) qui n'existe plus (car il est détruite)
    } else {
        return a;
    }
}

complexe Som_tab(int n, complexe *T) {
    complexe somTab; //Ici il est automatiquement déclarer avec (0,0) => complexe()
    for(int i = 0; i < n; i++) {
        somTab = somTab.somme(T[i]);
    }
    return somTab;
}

complexe& max_tab(int n, complexe *T) { //la fonction va retouner une reference
    complexe *maximum = &T[0]; //j'ai crée un pointeur qui point sur l'adresse du 1er element au lieu de copie
    for (int i = 1; i < n; i++) {
        maximum = &(maximum->maxi(T[i])); //maximum va prendre l'adresse de reference du maximum retouner par la fonction maxi()
    }
    return *maximum; // Retourner une référence pour éviter une copie inutile
}


void modif_tab(complexe *T) {
    int i;
    float re, img;
    cout << "Entrer l'indice de l'element a modifier : " << endl;
    cin >> i;
    cout << "La nouvelle valeur reel : " << endl;
    cin >> re;
    cout << "La nouvelle valeur complexe : " << endl;
    cin >> img;
    T[i].modifier(re,img);
}

/*complexe complexe::remplirTab(float a, float b) {
    complexe z;
    z.px = a;
    z.py = b;
    return z;
}*/

int main() {
    /*complexe c1(-1,-2);
    c1.afficher();

    c1.modifier(-3,-4);
    cout << "Apres modification : ";
    c1.afficher();

    complexe c2(1,2);
    c2.afficher();

    complexe c3(4,8);

    complexe sum = c1.somme(c2);
    cout << "La somme des deux nombre complexes : ";
    sum.afficher();
    //px et py sont privé donc je peux pas faire un cout dans main

    complexe& maximum1 = c1.maxi(c2); //la fonction retourne une reference vers le maximum (c1 ou c2), cela signifie que maximum1 et (c1 ou c2) sont juste deux noms differents pour le meme objet en mémoire
    cout << "Le maximum des deux nombre complexes : ";
    maximum1.afficher();

    complexe& maximum2 = c1.maxi(c3);
    cout << "Le maximum des deux nombre complexes : ";
    maximum2.afficher();

    int n = 5;
    complexe *T = new complexe[n];*/

    int n;
    cout << "Entrer la taille du tableau : ";
    cin >> n;
    complexe *T = new complexe[n];
    float a, b;

    for (int i = 0; i < n; i++) {
        cout << "Reel " << i << "= ";
        cin >> a;
        cout << "Img " << i << "= ";
        cin >> b;
        T[i].modifier(a,b);
    }

    for (int i = 0; i < n; i++) {
        T[i].afficher();
    }

    complexe sum = Som_tab(n, T); // Fait la copie
    cout << "La somme de tous les elements du tableau est : ";
    sum.afficher();

    complexe maxObj = max_tab(n, T);
    cout << "L'objet de plus grand module est : ";
    maxObj.afficher();

    return 0;
}
