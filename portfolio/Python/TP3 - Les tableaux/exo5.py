ch = input("Entrer un text : ")

listeMot = ch.split();

frequence_mots = {}

for mot in listeMot :
  if mot in frequence_mots :
    frequence_mots[mot] += 1
  else :
    frequence_mots[mot] = 1
for mot , freq in frequence_mots.items() :
  print("La frequence de (",mot,") est :",freq)