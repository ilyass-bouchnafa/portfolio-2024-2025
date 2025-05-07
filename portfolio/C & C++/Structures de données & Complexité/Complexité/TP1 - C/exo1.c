#include <stdio.h>
#include <stdlib.h>

int Cherche_Dich_It(int A[] , int n , int cle) {
    int d, f, i;
    int trouve;
    d = 0; // d : indice du debut de tableau
    f = n-1; // f : indice de la fin du tableau
    trouve = 0;

    while (trouve!=1) {
        i = (d + f)/2;
        if (A[i] == cle) {
            trouve = 1;
        }
        else if (A[i] < cle) {
            d = i + 1;
        }
        else {
            f = i - 1;
        }
    }
    return i;
}
int main()
{
    int n , i , x;
    int resultat;

    printf("Entrer la taille du tableau : ");
    scanf("%d",&n);

    int Tab[n];

    for(i=0;i<n;i++) {
        printf("T[%d]= ",i+1);
        scanf("%d",&Tab[i]);
    }

    printf("Entrer le cle : ");
    scanf("%d",&x);

    resultat = Cherche_Dich_It(Tab,n,x);

    printf("La premier occurence se trouve dans la colonne %d du tableau.",resultat+1);


    return 0;
}


