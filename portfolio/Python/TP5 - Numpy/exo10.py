import numpy as np

tableau = np.array([20,35,50,65,80,95,110,125,140,155])
#tableau2 = np.append(0, tableau[0:9])
#tableau3= tableau - tableau2
tableau_diff = np.diff(tableau) #il calcule directement la premier différence des éléments
print("Le tableau initial : \n",tableau)
print("Première différence : \n",tableau_diff)
#print(tableau2)
#print(tableau3)
#tableau4 = tableau3[tableau3 > 20]
valeurs_sup_20 = tableau_diff[tableau_diff > 20]
print(valeurs_sup_20)
moyenne = np.mean(tableau[tableau < 100])
print("La moyenne des elements inférieur à 100 : ",moyenne)
tableau[tableau > 100] = moyenne
print("Tableau après remplacement des valeurs supérieures à 100 : \n",tableau)
tableau5 = np.sort(tableau)[::-1]
print("Tableau trié dans l'ordre décroissant est : \n",tableau5)