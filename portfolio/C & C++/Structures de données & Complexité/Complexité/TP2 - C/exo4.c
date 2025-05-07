#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char *multichar(char *s, int n) {
  char *nouveau;
  int i ,j ,k ,taille;

  taille = strlen(s) * n + 1; // le +1 est dedié à l'element de la fin de la chaine '\0'

  nouveau = (char*)malloc(taille*sizeof(char)); // nouvelle chaine
  k = 0;
  for (i = strlen(s)-1 ; i >= 0 ; i--) {  // On commence par la fin de la chaine
    for (j=0;j<n;j++) {
      nouveau[k++] = s[i] ;
    }
  }
  nouveau[k] = '\0';
  return nouveau;

}

int main() {
  char nom[100];
  int n;

  printf("Entrer un nom : ");
  scanf("%s",nom);

  printf("Entrer le nombre de repitition de chaque lettre : ");
  scanf("%d",&n);

  char *result = multichar(nom, n);
  printf("La nouvelle chaine est : \n%s",result);

  free(result);

  return 0;
}