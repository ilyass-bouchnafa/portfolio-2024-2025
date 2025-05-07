import numpy as np

tableau = [15,22,35,40,55,60,72,85,90,100]
moyenne = np.mean(tableau)

mediane = np.median(tableau)
ecart_type = np.std(tableau)
print(f"La moyenne est : {moyenne}, la médiane est : {mediane}, l'écart-type est : {ecart_type}")

x_min = np.min(tableau)
x_max = np.max(tableau)
tableau2 = (tableau - x_min) / (x_max - x_min)
print("Les données après normalisation sont : ",tableau2)

tableau3 = np.where(tableau > moyenne)[0]
print("les indices des éléments supérieurs à la moyenne sont : ",tableau3)
