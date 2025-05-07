import numpy as np

tableau = np.arange(1,51)

print("*****Nombre pairs dans le tabeau*****\n")
tableau_paire = tableau[tableau % 2 == 0]
print(tableau_paire)

print("\n")

print("*****Remplacement des multiples de 5 par -1*****\n")
tableau[tableau % 5 == 0] = -1
print(tableau)

print("\n")

print("*****Les indices des éléments égaux à -1*****\n")
taille = len(tableau)
tableau_indice = []

for i in range(taille) :
    if tableau[i] == -1 :
        tableau_indice.append(i)
print(tableau_indice)

#tableau_indice = np.where(tableau == -1)[0]   
#print(tableau_indice)
#np.where(condition)[0] donne un tuple avec 1 seul element qui est 
#une array qui contient les indices satisfaisant la condition donné 
#c'est pour ça on ajouté [0] pour extraire l'element de l'indice 0
