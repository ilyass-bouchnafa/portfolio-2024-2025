import matplotlib.pyplot as plt

Catégories =  ["Électronique", "Vêtements", "Meubles", "Alimentation"] 
Ventes = [1500, 1200, 800, 1000] 

plt.pie(
    Ventes, 
    labels=Catégories,  
    autopct="%1.1f%%",  
    startangle=90,
    colors = ["green", "red", "yellow", "blue"] 
    )
plt.title("Les ventes par catégorie de produit")
plt.show()