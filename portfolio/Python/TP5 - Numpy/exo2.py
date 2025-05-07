import numpy as np

tableau = np.arange(1,21)  #np.arange([start,] stop[, step, dtype=(int or float)

matrice = tableau.reshape(4,5)

transpose_matrice = np.transpose(matrice)

print(matrice)

print("\n")

print(transpose_matrice)

newArray = matrice.reshape(20,) #on utilise .reshape(n,) ou bien .reshape(-1) permet le passage de 2D à 1D avec n le nombre des éléments qui se trouve dans la matice et -1 dit à NumPy de calcle automatiquement la taille de cette dimension

print("\n")

print(newArray)

