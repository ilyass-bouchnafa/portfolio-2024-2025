def calculatrice(n1,n2,op) :
    try :
        if op not in ['+','-','*','/'] :
            raise ValueError("Opération non valide")
        else :
    
            match op :
                case '+' :
                    print(f"{n1} + {n2} = {n1+n2}")
                case '-' :
                    print(f"{n1} - {n2} = {n1-n2}")
                case '*' :
                    print(f"{n1} * {n2} = {n1*n2}")
                case '/' :
                    try :
                        print(f"{n1} / {n2} = {n1/n2}")
                    except ZeroDivisionError :
                        print("Erreur : Division par 0")
    except ValueError as e :
        print(e)

while True :
    try :
        nombre1 = float(input("Entrer le nombre 1 : "))
        nombre2 = float(input("Entrer le nombre 2 : "))
        operation = input("Entrer l'operation : ")
        calculatrice(nombre1,nombre2,operation)
        break
    except ValueError :
        print("Erreur : Entrer des nombres")
    


            