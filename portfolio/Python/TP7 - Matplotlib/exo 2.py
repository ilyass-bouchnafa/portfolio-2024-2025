import matplotlib.pyplot as plt

Catégories =  ["Électronique", "Vêtements", "Meubles", "Alimentation"] 
Ventes = [1500, 1200, 800, 1000] 

plt.bar(Catégories, Ventes, color=["green", "red", "yellow", "blue"], width=0.6)
plt.title("Les ventes par catégorie de produit")
plt.xlabel("Catégories")
plt.ylabel("Ventes")
plt.show()
