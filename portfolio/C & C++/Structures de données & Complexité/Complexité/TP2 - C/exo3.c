#include <stdio.h>
#include <stdlib.h>

unsigned long long *suiteTab(int n) {
  int i;
  unsigned long long  *T = (unsigned long long*)malloc(n*sizeof(unsigned long long ));

  T[0] = 1;
  for (i=1;i<n;i++) {
    T[i] = 3 * T[i-1] * T[i-1] + 2 * T[i-1] + 1;
  }
  return T;
}

int main() {
  int n ,i;
  unsigned long long  *tab;

  printf("Entrer un entier n :");
  scanf("%d",&n);

  tab = suiteTab(n);
  for (i=0;i<n;i++) {
    printf("%llu  ",tab[i]); // %llu est le spécificateurs de format pour le type unsigned long long et aussi pour le type usigned long long int
  }
  
  free(tab);
  return 0;
}
