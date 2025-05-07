#include <stdio.h>
#include <stdlib.h>

int **matrice(int L ,int C) {
  int i, j;
  int **MAT;

  MAT = (int**)malloc(L*sizeof(int*));
  for (i=0;i<L;i++) {
    MAT[i] = (int*)malloc(L*sizeof(int));
  }
  for (i=0;i<L;i++) {
    for (j=0;j<C;j++) {
      printf("T[%d][%d]= ",i,j);
      scanf("%d",&MAT[i][j]);
    }
  }
  return MAT;
}
void afficher(int **MAT ,int L ,int C) {
  int i, j;

  for (i=0;i<L;i++) {
    for (j=0;j<C;j++) {
      printf("%d\t",MAT[i][j]);
    }
    printf("\n");
  }
}
int **Addition(int **MAT1 ,int **MAT2 ,int L ,int C) {
  int i, j;
  int **MAT ;

  MAT = (int**)malloc(L*sizeof(int*));
  for (i=0;i<L;i++) {
    MAT[i] = (int*)malloc(C*sizeof(int));
  }

  for (i=0;i<L;i++) {
    for (j=0;j<C;j++) {
      MAT[i][j] = MAT1[i][j] + MAT2[i][j] ;
    }
  }
  return MAT ;
}
int **Multiplication(int **MAT1 ,int **MAT2 ,int L1 ,int C1 ,int C2) {
  int i, j ,k;
  int **MAT;

  MAT = (int**)malloc(L1*sizeof(int*));
  for (i=0;i<L1;i++) {
    MAT[i] = (int*)malloc(C2*sizeof(int));
  }

  for (i=0;i<L1;i++) {
    for (j=0;j<C2;j++) {
      MAT[i][j] = 0;
      for (k=0;k<C1;k++) {
        MAT[i][j] += MAT1[i][k] * MAT2[k][j] ;
      }
    }
  }
  return MAT;
}

int main() {

  int L1 ,L2 ,C1 ,C2;
  int i, j;
  int **MAT1 ,**MAT2;

  printf("Entrer le nombre de ligne de la 1er matrice: ");
  scanf("%d",&L1);

  printf("Entrer le nombre de cologne de la 1er matrice: ");
  scanf("%d",&C1);

    printf("Entrer le nombre de ligne de la 2eme matrice: ");
  scanf("%d",&L2);

  printf("Entrer le nombre de cologne de la 2eme matrice: ");
  scanf("%d",&C2);


  printf("Remplir la matrice 1 : \n");
  MAT1 = matrice(L1,C1);
  printf("Remplir la matrice 2 : \n");
  MAT2 = matrice(L2,C2);

  printf("La matrice 1 est : \n");
  afficher(MAT1,L1,C1);
  printf("La matrice 2 est : \n");
  afficher(MAT2,L2,C2);
  if (L1 == L2 && C1 == C2) {
    printf("L'addition des deux matrice est : \n");
    afficher(Addition(MAT1,MAT2,L1,C1),L1,C1);
  }
  else {
    printf("L'addition est impossible!");
  }
  printf("La multiplication des deux matrices est : \n");
  afficher(Multiplication(MAT1,MAT2,L1,C1,C2),L1,C2);

  return 0;
}
