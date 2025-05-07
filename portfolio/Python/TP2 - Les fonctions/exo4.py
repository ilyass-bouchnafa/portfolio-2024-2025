import math
def deg_to_rad(degre) :
  result = math.radians(degre)
  return result
angle=int(input("Entrer l'angle en degrés : "))
print("La convertion en radians est : ",deg_to_rad(angle))