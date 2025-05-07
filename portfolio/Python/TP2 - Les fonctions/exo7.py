import random

computer = random.randint(1,100)
user = int(input("Entrer un nombre entre 1 et 100 : "))

while user < 1 or user > 100 : 
  user = int(input("Entrer un nombre entre 1 et 100 : "))


print("Le computer à choisit : ",computer)
if user == computer :
  print("Le nombre choisit est correcte.")
elif user > computer :
  print("Le nombre choisit est trop élevée.")
elif user < computer :
  print("Le nombre choisit est trop basse.")