ch = input("Entrer un text : ")

listeMot = ch.split()

for mot in listeMot :
  nbr = 0
  for caractere in mot :
    nbr += 1
  print("Le mot ",mot,"contient ",nbr,"caractere")