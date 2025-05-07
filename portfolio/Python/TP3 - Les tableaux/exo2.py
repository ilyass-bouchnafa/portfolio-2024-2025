#tableau = []
#print("Entrer 8 chiffre : \n")
#for i in range(8) :
  #x=int(input(f"Chiffre {i}: "))
  #tableau.append(x)
#max = tableau[0]    
#for i in range(0,8) :
  #if max < tableau[i] :
    #max = tableau[i]
#print("Le maximum dans le tableau est : ",max)

max = 0
for i in range(0,8) :
  x=int(input(f"Entrer le chiffre {i} :"))
  if max < x :
    max = x
print("Le maximum dans le tableau est : ",max)



  


