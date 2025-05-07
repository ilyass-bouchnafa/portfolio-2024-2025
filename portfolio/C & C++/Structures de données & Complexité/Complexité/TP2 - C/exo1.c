#include <stdio.h>
#include <stdlib.h>

void insererDansTableau(int T[], int n, int i, int m) {  //inserer l'element m dans la position i sans supprimer des elements
  int j;
  for (j=n ; j >= i ; j--) {
    T[j+1] = T[j] ;
  }
T[i] = m;

}

int main() {
  int N, n, i, m;
  int j;
  int *tab;

  printf("Entrer la taille du tableau : ");
  scanf("%d",&N);

  tab=(int*)malloc(N*sizeof(int));

  printf("Entrer le nombre d'elements dans le tableau : ");
  scanf("%d",&n);

  printf("Remplir le tableau : ");
  for (j=0 ; j<n ; j++) {
    printf("T[%d]= ",j+1);
    scanf("%d",(tab+j));
  }


  printf("Entrer l'entier a inserer : ");
  scanf("%d",&m);

  printf("Entrer la position d'insertion dans le tableau : ");
  scanf("%d",&i);

printf("Le tableau apres insertion : ");
  if (n < N && i <= n) {
    insererDansTableau(tab, n, i, m) ; // pour la position on commence de l'indice 0 sinon on fait i-1
    for (j=0;j<=n;j++) {
      printf("%d  ",*(tab+j));
    }
  }
  else {
    printf("Impossible d'inserer dans le tableau");
  }

  free(tab);
  return 0;

}
