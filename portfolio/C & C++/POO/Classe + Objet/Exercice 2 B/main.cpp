#include <iostream>
#include <cmath>
#include <stdlib.h>

using namespace std;

class complexe {
    float *px;
    float *py;
    public :
        complexe();
        complexe(float, float);
        ~complexe();
        complexe(complexe&);
        void afficher();

        complexe& operator=(complexe&);

};

complexe::complexe() {
    px = new float;
    py = new float;
    *px = 0;
    *py = 0;
}

complexe::complexe(float x, float y) {
    px = new float;
    py = new float;
    *px = x;
    *py = y;
}

complexe::~complexe() {
    delete px;
    delete py;
    //cout << "Destruction du nombre complexe : (" << px << ") + (" << py << "i)" << endl;
}

void complexe::afficher() {
    cout << "(" << *px << ") + (" << *py << "i)" << endl;

}

complexe::complexe(complexe &z) {
    px = new float;
    py = new float;
    *px = *(z.px);
    *py = *(z.py);
}

complexe& complexe::operator=(complexe& a) {
    *px = *(a.px);
    *py = *(a.py);
    return *this; //Pour retourné une copie => *this retourne une reference de l'objet courant "existant"
}

int main() {

    complexe c1(1.5,2.3);
    c1.afficher();
    complexe c2;
    c2 = c1;
    c2.afficher();

    return 0;
}
