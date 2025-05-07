import random

N=int(input("Entrer la longueur du mdp :"))
mdp = ''
caractere = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','?','§','!','\'','^','$','-','8','#','&']

for i in range(1,N+1) :
  X=random.choice(caractere)
  mdp += X

print("Voici un mdp : ",mdp)

