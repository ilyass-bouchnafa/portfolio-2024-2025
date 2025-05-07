#include <iostream>
#include <stdlib.h>

using namespace std;

class point3d {
    float x, y, z;
    static int compteur;
    public :
        point3d(float a = 0, float b = 0, float c = 0){
            compteur++;
            x = a;
            y = b;
            z = c;
        }
        void afficher();
        static int funcCompteur();
        ~point3d();
};

int point3d::compteur = 0;

int point3d::funcCompteur() {
      return compteur;
}

point3d::~point3d() {
    x = 0;
    y = 0;
    z = 0;
    compteur--;
}

void point3d::afficher() {
    cout << "x = " << x << ", y = " << y << ", z = " << z << endl;
    //cout << "Le nombre d'objet est : " << compteur << endl;
}

int main() {
    point3d p1(1,2,3);
    p1.afficher();
    cout << "Le nombre d'objet est : " << point3d::funcCompteur() << endl;

    point3d p2;
    /*Le point crée possédera trois coordonnées nulles car le point est déclaré sans fournir les coordonées
    Ici pas nécessaire d'utiliser les parenthèses car on va prendre le 2eme constructeur (surdéfinie)*/
    p2.afficher();
    cout << "Le nombre d'objet est : " << point3d::funcCompteur() << endl;

    point3d p3(1,5);
    p3.afficher();
    cout << "Le nombre d'objet est : " << point3d::funcCompteur() << endl;

    return 0;
}

