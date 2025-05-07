#include <iostream>
#include <stdlib.h>

using namespace std;

class point3d {
    float x, y, z;
    static int compteur;
    public :
        point3d(float a, float b, float c);
        point3d();
        void afficher();
        ~point3d();
};

int point3d::compteur = 0;

point3d::point3d(float a, float b, float c) {
    compteur++;
    x = a;
    y = b;
    z = c;
}

point3d::point3d() {
    compteur++;
    x = 0;
    y = 0;
    z = 0;
}

point3d::~point3d() {
    x = 0;
    y = 0;
    z = 0;
}

void point3d::afficher() {
    cout << "x = " << x << ", y = " << y << ", z = " << z << endl;
    cout << "Le nombre d'objet est : " << compteur << endl;
}

int main() {
    point3d p1(1,2,3);
    p1.afficher();

    cout << "\n";

    point3d p2;
    /*Le point crée possédera trois coordonnées nulles car le point est déclaré sans fournir les coordonées
    Ici pas nécessaire d'utiliser les parenthèses car on va prendre le 2eme constructeur (surdéfinie)*/
    p2.afficher();
    
    cout << "\n";

    point3d p3(1,5,9);
    p3.afficher();


    return 0;
}

