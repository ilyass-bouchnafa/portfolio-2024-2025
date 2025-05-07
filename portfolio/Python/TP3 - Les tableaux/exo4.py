ch=input("Entrer un chaine de caractere : ")

occ = ch[0]
ch = occ + ch[1:].replace(occ,'$')
print(ch)