import numpy as np

matrice = np.array([[1,2,3],[4,5,6],[7,8,9]])
print(matrice)
det = np.linalg.det(matrice)
print("Déterminant de la matrice est : ",det)

if det != 0 :
    invMatrice = np.linalg.inv(matrice)
    print("La matrice est inversible et son inverse est : \n",invMatrice)
    newMatrice = np.dot(matrice,invMatrice)
    print("produit matriciel est : \n",np.round(newMatrice, 2))
else :
    print("La matrice n'est pas inversible")
#val_vect = np.linalg.eig(matrice)
#print("Valeurs propres et vecteurs propres : \n",vect_val)"""
val, vect = np.linalg.eig(matrice)
print("Les valeurs propres sont : \n",val)
print("Les vecteurs propres sont : \n",vect)

