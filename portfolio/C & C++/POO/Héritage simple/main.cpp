#include <iostream>
#include <string.h>
#include <string>

using namespace std;

/* ===============> Classe Personne <================ */

class Personne {
    protected :
        char *nompre; // le nom et prénom de la personne
        char CIN[20]; // le CIN de la personne
        int age; // l'age
    public :
        Personne(); //constructeur sans arguments
        Personne(char*, char*, int); // constructeur à trois arguments
        void modifier(char*); // fonction de modification du nom
        void afficher(); // fonction d'affichage
        ~Personne(); // destructeur
        Personne(Personne &); // Constructeur par recopie
        Personne & comparer(Personne &);
        bool operator==(Personne &);
};

Personne::Personne() {
    nompre = new char[15];
    strcpy(nompre, "None");
    strcpy(CIN, "None");
    age = 0;
}

Personne::Personne(char* np, char* c, int a) {
    nompre = new char[strlen(np) + 1];
    strcpy(nompre, np);
    strcpy(CIN, c);
    age = a;
}

void Personne::modifier(char* np) {
    delete nompre;
    nompre = new char[strlen(np) + 1];
    strcpy(nompre, np);
}

void Personne::afficher() {
    cout << "Nom et Prenom :" << nompre << endl;
    cout << "CIN : " << CIN << endl;
    cout << "Age : " << age << endl;
}

Personne::~Personne() {
    cout << "\Appel du constructeur";
    delete nompre;
}

Personne::Personne(Personne &p) {
    nompre = new char[strlen(p.nompre) + 1];
    strcpy(nompre, p.nompre);
    strcpy(CIN, p.CIN);
    age = p.age;
}

/*Personne & Personne::comparer(Personne &p) {
    if (strcmp(nompre, p.nompre) == 0 && strcmp(CIN, p.CIN) == 0) {
        if (age > p.age) {
            return *this;
        }
        else if (age < p.age) {
            return p
        }
    }
}*/

Personne & Personne::comparer(Personne &p) {
    if (p.age >= age) return p;
    else return *this;
}

bool Personne::operator==(Personne &p) {
    if (age == p.age) {
        return true;
    }
    else return false;
}

/* ==================> Classe Employe <==================== */

class Employe : public Personne {
private :
    float salaire;
    int anciennete;
public :
    Employe();
    Employe(char*, char*, int, float, int);
    ~Employe();
    void afficher();
    void incrimente(int, int);


};

Employe::Employe() { // Appelle du constructeur par defaut de la classe de base par defaut
    salaire = 0;
    anciennete = 0;
}


Employe::Employe(char* np, char* c, int a, float s, int anc) : Personne(np, c, a) { // Si on supprime Personne(np, c, a) on a le constructeur par defaut dans la classe de base
    salaire = s;
    anciennete = anc;
}

Employe::~Employe() {
    cout << "\nL'objet est détruit";
}

void Employe::afficher() { /* Ici je peux appeller la fonction afficher de la classe de base par */
    /*cout << "Nom et Prenom :" << nompre << endl;
    cout << "CIN : " << CIN << endl;
    cout << "Age : " << age << endl;*/
    Personne::afficher();
    cout << "Salaire : " << salaire << endl;
    cout << "Ancinnete : " << anciennete << endl;
    cout << "****************************" << endl;
}

void Employe::incrimente(int a, int anc) {
    age += a;
    anciennete += anc;
}




 /* =================> Main <================== */


 int main() {
    Personne p1("Alami", "C212", 25);
    p1.modifier("Alami Ali");
    p1.afficher();
    Personne p2=p1;
    p2.afficher();
    if (p1 == p2) cout << "\nLes objets ont le meme age" << endl;
    else cout << "\nLes objets n'ont pas le meme age" << endl;


    Employe e1("Ilyass Bh", "E141", 21, 100, 2007);
    e1.afficher();


    return 0;
 }



