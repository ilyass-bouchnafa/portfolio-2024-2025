print("Résout l'équation linéaire ax + b = c")
a=int(input("Entrer la valeur de a : "))
b=int(input("Entrer la valeur de b : "))
c=int(input("Entrer la valeur de c : "))
if a==0 :
    print("L'équation n'admet pas de solution")
else :
    print("La solution de l'equation est : ",(c-b)/a) 
    