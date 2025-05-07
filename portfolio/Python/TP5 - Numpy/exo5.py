import numpy as np

tableau = np.array([10.5,20.3,30.7,40.1,50.9])

tableau_int = tableau.astype(np.int64)
print("Tableau converti en entier : ",tableau_int)

somme1 = np.sum(tableau)
somme2 = np.sum(tableau_int)
print("La somme des éléments avant la conversion : ",somme1)
print("La somme des éléments après la conversion : ",somme2)

tableau_flottant = tableau_int.astype(np.float64) + 0.25
print("Tableau converti en flottant et augmenté par 0.25 : ",tableau_flottant)
