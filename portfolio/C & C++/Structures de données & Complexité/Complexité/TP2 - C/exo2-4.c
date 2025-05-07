#include <stdio.h>
#include <stdlib.h>

void matrice(int **MAT ,int L ,int C) {
  int i, j;
  for (i=0;i<L;i++) {
    for (j=0;j<C;j++) {
      printf("T[%d][%d]= ",i,j);
      scanf("%d",&MAT[i][j]);
    }
  }
}
void afficher(int **MAT ,int L ,int C) {

  int i, j;
  matrice(MAT,L, C);

  for (i=0;i<L;i++) {
    for (j=0;j<C;j++) {
      printf("%d  ",MAT[i][j]);
    } 
    printf("\n");
  }
}

int main() {

  int L, C, i, j;
  int **MAT;

  printf("Entrer le nombre de ligne: ");
  scanf("%d",&L);

  printf("Entrer le nombre de cologne: ");
  scanf("%d",&C);
  
  MAT = (int**)malloc(L*C*sizeof(int*));
  for (i=0;i<L;i++) {
    MAT[i] = (int*)malloc(L*sizeof(int));
  }

  afficher(MAT,L,C);

  return 0;
}