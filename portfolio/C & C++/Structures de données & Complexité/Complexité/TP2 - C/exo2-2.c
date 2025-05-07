#include <stdio.h>
#include <stdlib.h>

void inverserTableau(int T[] ,int n) {
  int i ,j ,temp;
  for (i=0,j=n-1;j>i;i++,j--) {
        temp = T[i];
        T[i] = T[j];
        T[j] = temp;
  }
}

int main() {
  int N ,i;
  int *tab;

  printf("Entrer la taille du tableau : ");
  scanf("%d",&N);

  tab = (int*)malloc(N*sizeof(int));

  for (i=0;i<N;i++) {
    printf("T[%d]= ",i+1);
    scanf("%d",tab+i);
  }

  inverserTableau(tab, N);

  for (i=0;i<N;i++) {
    printf("%d  ",*(tab+i));
  }

  free(tab);
  return 0;
}