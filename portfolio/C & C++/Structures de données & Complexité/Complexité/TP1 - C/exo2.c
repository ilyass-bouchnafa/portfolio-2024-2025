#include <stdio.h>
#include <stdlib.h>

int main() {
    int n, i, j, aux;

    printf("Entrer la taille du tableau : ");
    scanf("%d", &n);

    int tab[n];

    for(j = 0; j < n; j++) {
        printf("T[%d]= ", j + 1);
        scanf("%d", &tab[j]);
    }

    for(i = 0; i < n - 1; i++) {
        for(j = n - 1; j > i; j--) {
            if(tab[j] < tab[j - 1]) {
                aux = tab[j];
                tab[j] = tab[j - 1];
                tab[j - 1] = aux;
            }
        }
    }

    printf("Le tableau trié à bulles est :\n");
    for(j = 0; j < n; j++) {
        printf("%d\n", tab[j]);
    }

    return 0;
}
