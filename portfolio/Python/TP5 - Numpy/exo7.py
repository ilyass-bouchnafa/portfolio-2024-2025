import numpy as np

tableau = np.random.randint(1,101,size=20)
#size=size :  Spécifie le nombre d'éléments dans le tableau (pas besoin de tuple si une seule dimension) .
#Il n'est pas nécessaire de spécifier dtype=int dans ce cas car la fonction np.random.randint() génère déjà des entiers (type int), donc l'utilisation explicite de dtype=int dans np.array() est redondante. 
#Pour un tableau 2D, utilisez un tuple #size=(rows, cols). 
# #REMARQUE: la fonction np.random.randint() avec size génère directement un tableau NumPy

print(tableau)

indices = np.argsort(tableau)[-3:][::-1]
#np.argsort() trie les indices en fonction des valeurs correspondantes.
#[-3:] sélectionne les indices des 3 plus grandes valeurs.
#[::-1] inverse l'ordre pour obtenir les indices dans l'ordre décroissant des valeurs.

maxThree = tableau[indices]

tableau1 = tableau[tableau >= 50]

moyenne = np.mean(tableau1)

tableau[tableau < 50] = moyenne



print(indices)
print(maxThree)
print(moyenne)
print(tableau)





