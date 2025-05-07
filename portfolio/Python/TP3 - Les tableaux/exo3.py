prix = {'PS3' : 1000 ,'PS4' : 4000 ,'PS5' : 5500 }

x=input("Entrer l'acticle à changer le prix : ")

match x :
  case 'PS3' :
    new_price=int(input("Entrer le nouveau prix : "))
    prix['PS3'] = new_price
  case 'PS4' :
    new_price=int(input("Entrer le nouveau prix : "))
    prix['PS4'] = new_price
  case 'PS5' :
    new_price=int(input("Entrer le nouveau prix : "))
    prix['PS5'] = new_price
  case _ :
    print("Article indisponible!!")

print("Les nouveaux prix sont : \n",prix)

