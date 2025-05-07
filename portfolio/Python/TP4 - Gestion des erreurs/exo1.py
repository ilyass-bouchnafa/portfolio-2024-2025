def calculer_moyenne(liste) :
    count = 0
    sum = 0
    notes = []
    try :
        for i in liste :
            try :
                note = float(i)
            except ValueError:
                print("Toutes les notes doivent etre des nombres")
                return
            if note < 0 or note > 20 :
                raise ValueError("Les notes doivent etres entre 0 et 20")
            sum += note
            count += 1
        moy = sum / count
        print("La moyenne est : ",moy)
    except ValueError as e:
        print(e)
    finally :
        print("Fin")

    
while True :
    try : 
        listeNotes = input("Entrer les notes separer par des espaces : ").split()
        if not listeNotes :
            raise ValueError("La liste est vide => division par 0")
        calculer_moyenne(listeNotes)
        break
    except ValueError as e :
        print(e)
        





    