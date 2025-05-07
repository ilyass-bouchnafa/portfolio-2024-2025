import numpy as np

tableau = np.arange(1,26)
matrice = tableau.reshape(5,5)

print(matrice)

print("\n")

extraireElement = matrice[1,3] #les indices commencent de 0 pour les lignes et les colonnes

print("L'element de la 2ème ligne et de la quatrième colonne est :",extraireElement)

extraireSousTableau = matrice[1:4,1:4] # 1:4[ -> de 1 à 3

print("Les éléments centraux du sous tableau 3x3 sont : \n",extraireSousTableau)

for i in range(5) : #on peut utiliser np.fill_diagonal(matrice, 0)
    matrice[i][i] = 0
#np.fill_diagonal(matrice, 0)
print("La matrice après le remplacement du diagonale principale par 0 est : \n",matrice)

