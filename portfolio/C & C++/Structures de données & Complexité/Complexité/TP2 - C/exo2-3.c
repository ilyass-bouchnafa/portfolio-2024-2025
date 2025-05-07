#include <stdio.h>
#include <stdlib.h>

int* fusionnerTableau(int *tab1 ,int *tab2 ,int N1 ,int N2) {
  int N = N1 + N2;
  int i=0, j=0, k=0;
  int *tab;

  tab = (int*)malloc(N*sizeof(int));

  while (i < N1 && j < N2) {  //Cette boucle permet de comparer les elements des deux tableaux
    if (tab1[i] < tab2[j]) {  
      tab[k++] = tab1[i++];
    } else {
      tab[k++] = tab2[j++]  ;
    }  
  }  

  while (i < N1) {  //S'il y a d'autre element qui reste dans tab1 on les copies dans tab
    tab[k++] = tab1[i++];
  }

  while (j < N2) {  //S'il y a d'autre element qui reste dans tab2 on les copies dans tab
    tab[k++] = tab2[j++];
  }
  return tab;
}

int main() {
  int N1 ,N2 ,N ,i;
  int *tab1 ,*tab2 ,*tab;

  printf("Entrer la taille du tableau 1 : ");
  scanf("%d",&N1);
  printf("Entrer la taille du tableau 2 : ");
  scanf("%d",&N2);

  tab1 = (int*)malloc(N1*sizeof(int));
  tab2 = (int*)malloc(N2*sizeof(int));
  
  printf("**** Remplir le tableau 1 ****\n");
  for (i=0;i<N1;i++) {
    printf("T1[%d]= ",i+1);
    scanf("%d",(tab1+i));
  }

  printf("**** Remplir le tableau 2 ****\n");
  for (i=0;i<N2;i++) {
    printf("T2[%d]= ",i+1);
    scanf("%d",(tab2+i));
  }

  N = N1 + N2;

  tab = fusionnerTableau(tab1, tab2, N1, N2);
  for (i=0;i<N;i++) {
    printf("%d  ",*(tab+i));
  }

  free(tab1);
  free(tab2);
  free(tab);
  return 0;
}
