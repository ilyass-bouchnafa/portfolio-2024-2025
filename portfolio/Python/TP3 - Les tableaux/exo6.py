ch = input("Entrer un text : ")

frequence_caractere = {}

for i in ch :
  if i != " " :
    if i in frequence_caractere :
      frequence_caractere[i] += 1
    else :
      frequence_caractere[i] = 1

for i, freq in frequence_caractere.items() :
  print("Le nombre de caractere (",i,") est :",freq)
