import numpy as np

A = np.array([0,2,4,6,8,10,12,14,16,18])
B = np.array([1,3,5,7,9,11,13,15,17,19])

somme = A + B
produit = A * B

division = np.round(A / B, 2)

sommeB = np.sum(B)
moyenneA = np.mean(A)
produit1 = moyenneA * sommeB

print(somme)
print(produit)
print(division)
print(produit1)
