#include <iostream>
#include <string.h>

using namespace std;

class Forme {
    protected :
        char nom[15] ;
    public :
        Forme(char[]);// constructeur
        virtual void afficher(); // fonction d'affichage
        virtual float aire()=0 ; // fonction de calcul de la surface
        ~Forme() ; // destructeur
};

Forme::Forme(char t[]) {
    strcpy(nom, t);
}

void Forme::afficher() {
    cout << "Nom : " << nom << endl;
}

Forme::~Forme() {
    cout <<"\nAppelle destructeur" << endl;
}

class Triangle : public Forme {
    private :
        float base, hauteur;
    public :
        Triangle(char[], float, float);
        ~Triangle();
        void afficher() override;
        float aire() override;

};

Triangle::Triangle(char n[], float b, float h) : Forme(n) {
    base = b;
    hauteur = h;
}

Triangle::~Triangle() {
    cout << "\nAppelle de destructeur";
    }

void Triangle::afficher() {
    Forme::afficher();
    cout << "Base : " << base << endl;
    cout << "Hauteur : " << hauteur << endl;
}

float Triangle::aire() {
    return (base * hauteur) / 2;
}

class Cercle : public Forme {
private :
    float rayon;
    static float pi;
public :
    Cercle(char*, float);
    ~Cercle();
    void afficher() override;
    float aire() override;
};

float Cercle::pi=3.14;

Cercle::Cercle(char *n, float r) : Forme(n) {
    rayon = r;
}

Cercle::~Cercle() {
    cout << "\nAppelle de destructeur";
}

void Cercle::afficher() {
    Forme::afficher();
    cout << "Rayon : " << rayon << endl;
}

float Cercle::aire() {
    return pi * rayon * rayon;
}

class Rectangle : public Forme {
private :
    float longueur, largeur;
public :
    Rectangle(char[], float, float);
    ~Rectangle();
    void afficher() override;
    float aire() override;
};

Rectangle::Rectangle(char n[], float lon, float lar) : Forme(n) {
    longueur = lon;
    largeur = lar;
}

Rectangle::~Rectangle() {
    cout << "\nAppelle de destructeur";
}

void Rectangle::afficher() {
    Forme::afficher();
    cout << "Longueur : " << longueur << endl;
    cout << "Largeur : " << largeur << endl;
}

float Rectangle::aire() {
    return longueur * largeur;
}

int main() {
    char s1[] = "Triangle1";
    Triangle T1(s1,10,5);
    T1.afficher();
    cout << "\tSurface: " << T1.aire();
}



