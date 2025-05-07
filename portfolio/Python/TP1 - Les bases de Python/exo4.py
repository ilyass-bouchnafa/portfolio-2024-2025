from math import pow, sqrt

print("Résourdre l'équation ax²+bx+c=0")
a=int(input("a = "))
b=int(input("b = "))
c=int(input("c = "))

if a == 0 :
  if b != 0 :
    print("La solution est : ", -c / b)
  else :
    print("Léquation n'admet pas de solution.")
    
else :
  delta = pow(b,2) - 4 * a * c
  if delta > 0 :
    x1 = (-b - sqrt(delta)) / (2 * a)
    x2 = (-b + sqrt(delta)) / (2 * a)
    print("L'équation admet deux solutions sont : ",x1, "et",x2)
  elif delta == 0 : 
    x = -b / (2 * a)
    print("L'équation admet une seule solution est : ",x)
  else :
    print("Léquation n'admet pas de solution réelle.")
       

