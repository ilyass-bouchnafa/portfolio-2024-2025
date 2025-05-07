from datetime import datetime

M = int(input("Quel est votre moi de naissance :"))
D = int(input("Quel est votre jour de naissance :"))

currentDate = datetime.now()

Y = currentDate.year

myNextBirthday = datetime(Y,M,D)

if myNextBirthday < currentDate :
  myNextBirthday = datetime(Y+1,M,D)

left = myNextBirthday - currentDate

print("Il reste",left.days,"jours à ton anniversaire")




 











