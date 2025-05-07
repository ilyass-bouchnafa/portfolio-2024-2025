from datetime import datetime

heureActuelle = datetime.now()

somme = 0
for i in range(1000000) :
  somme += i

heurApres = datetime.now()

tempsEcoule = heurApres - heureActuelle

print("Le temps ecoulé est :",tempsEcoule)
