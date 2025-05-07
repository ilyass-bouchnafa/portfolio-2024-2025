ch=input("Entrer une phrase : ")
n = 0

for i in ch :
  if i in ['a','e','i','o','u'] :
    n += 1
print(f"Le nombre de voyelle est : {n}")
