#include <stdio.h>
#include <stdlib.h>

int supprimerElement(int T[] ,int n ,int x) {
  int i;
  for (i=x;i<n-1;i++) {
      T[i] = T[i+1];
  }
  n--;
  return n;
}


int main() {
  int N , p ,i;
  int *tab;

  printf("Entrer la taille du tableau : ");
  scanf("%d",&N);

  tab = (int*)malloc(N*sizeof(int));

  for (i=0;i<N;i++) {
    printf("T[%d]= ",i+1);
    scanf("%d",tab+i);
  }

  printf("Entrer la position de l'element a supprimer : ");
  scanf("%d",&p);
  
  N = supprimerElement(tab ,N ,p-1);
  for (i=0;i<N;i++) {
    printf("%d  ",*(tab+i));
  }

  free(tab);
  return 0;


}