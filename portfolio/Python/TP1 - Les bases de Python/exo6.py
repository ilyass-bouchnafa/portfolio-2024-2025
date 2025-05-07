x=int(input("Entrer un nombre entier : "))
result = True
for i in range(2, x) :
  if (x % i) == 0:
    result = False
    break
  
if (result == True):
  print("Le nombre est premier")
else :
  print("Le nombre n'est pas premier")
