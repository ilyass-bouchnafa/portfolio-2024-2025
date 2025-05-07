import math

x=int(input("Entrer un entier : "))
result = True ;

while x < 0 :
  x=int(input("Entrer un entier positive : "))

if x == 1 or x == 0 :
  result = False
else :
  for i in range(2,int(math.sqrt(x))+1) :
    if x % i == 0 :
      result = False
      break

if result :
  print("Le nombre",x,"est premier")
else :
  print("Le nombre ", x,"n'est pas premier")