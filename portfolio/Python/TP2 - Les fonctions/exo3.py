def count_vowels(string) :
  n=0
  for i in string :
    if i=='a' or i=='e' or i=='u' or i=='o' or i=='i' :
       n=n+1
  return n
  
chaine=input("Entrer la chaine de caractère : ") #prend la valeur string par defaut
print("Le nombre de voyelles est  : ",count_vowels(chaine))




