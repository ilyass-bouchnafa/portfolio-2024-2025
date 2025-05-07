#include <iostream>
#include <stdlib.h>
#include <math.h>
using namespace std;

class complexe {
    float *px;
    float *py;
    public :
        complexe(); // constr. sans arguments
        complexe(float *, float *); // constr. avec 2 arguments
        ~complexe(); // destructeur
        void afficher(); // fonction d'affichage
        void modifier(float *, float *); // fonction de modification
        complexe somme(complexe);
        complexe & max(complexe &);
        complexe operator+(complexe); // Surcharge de l'opérateur +
        friend void modif_tab(complexe *, int, int, float *, float *);
};

complexe::complexe(float x, float y) {
    px = new float;
    py = new float;
    cout << "\nAppel au constructeur\t" <<"Adresse:"<<this << endl;
    *px = x;
    *py = y;
}

complexe::complexe() {
    px = new float;
    py = new float;
    cout << "\nAppel au constructeur\t" <<"Adresse:"<<this << endl;
    *px = 0;
    *py = 0;
}

complexe::~complexe() {
    cout <<"\Appel destructeur:" <<this << endl;
    delete px;
    delete py;
}

void complexe::afficher() {
    cout << "Valeurs : " << *px << "i + " << *py << endl;
}

void complexe::modifier(float dx, float dy) {
    *px+= dx;
    *py+= dy;
}


int main() {

    complexe c1(1.5,2.3);
    c1.afficher();
    complexe c2(5,1);
    c2.afficher();
    complexe *c3;
    c3 = new complexe(5.2,9.1);
    (*c3).afficher();







    delete c3;
    return 0;
}





