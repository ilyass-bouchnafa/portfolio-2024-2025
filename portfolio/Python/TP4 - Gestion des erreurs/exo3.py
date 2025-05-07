def calculer_mensualite(montant,taux,duree) :
    if montant < 0 or taux < 0 or duree < 0 :
        raise ValueError("Les valeurs doivent etre positives")
    if taux > 100 :                
        raise ValueError("Le taux d'intéret doit etre inferieur ou égale à 100%")
    if type(duree) != int :
        raise TypeError("La durée doit etres un nombre entier")
    
    M = ( montant * (1 + taux / 100)) / (duree * 12)
    return M

while True : 
    try :
        montant = float(input("Entrer le montant : "))
        taux = float(input("Entrer le taux en pourcentage : ")) 
        duree = int(input("Entrer la durée : ")) 
        result  = calculer_mensualite(montant,taux,duree)
        
    except ValueError as e :
        print(f"Erreur : {e}")
    except TypeError as e :
        print(f"Erreur : {e}")
    else : 
        print(f"La mensualité est : {result}")
        break
    finally :
        print("Fin du calcul de pret")

    

    