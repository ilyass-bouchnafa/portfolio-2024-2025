import matplotlib.pyplot as plt
import pandas as pd
#1
df = pd.read_csv("c:/Users/HP/Desktop/Sécurité Windows/Python/TP/TP7 - Python/Matplotlib/ventes.csv")
dfFive = df.head(5)
print(dfFive)
dfInfo = df.info()
print(dfInfo)
#2
######## 6 #########
fig, axs = plt.subplots(2, 2, figsize=(8,6))
####################
df["Date"] = pd.to_datetime(df["Date"], format='%d/%m/%Y')
df["Mois"] = df["Date"].dt.month
df["Total"] = df.apply(lambda row: row["Prix"] * row["Quantité"], axis=1)
chiffreA = df.groupby("Mois")["Total"].sum().reset_index() #Si vous souhaitez donner un nom à la colonne résultante, vous pouvez utiliser la méthode .reset_index() pour convertir le résultat en DataFrame
#plt.plot(chiffreA["Mois"], chiffreA["Total"], color="blue", marker="o")
# 6 #
axs[0, 0].plot(chiffreA["Mois"], chiffreA["Total"], color="blue", marker="o")
axs[0, 0].set_title("Evolution du chiffre d'affaire mensuel")
#####
plt.xlabel("Mois")
plt.ylabel("Total")
plt.annotate(
    text="Le chiffre d'affaire maximal", 
    xy=(8, 112.5), 
    xytext=(2, 80),
    arrowprops=dict(facecolor='red',arrowstyle="->")
    )

#3
chiffreAV = df.groupby("Ville")["Total"].sum().reset_index()
#plt.bar(chiffreAV["Ville"], chiffreAV["Total"], color='green', width=0.6 )
# 6 #
axs[0, 1].bar(chiffreAV["Ville"], chiffreAV["Total"], color='green', width=0.6 )
axs[0, 1].set_title("Chiffre d'affaires par ville")
#####
plt.xlabel("Ville")
plt.ylabel("Total")

#4
def categoriePrix(Prix) :
    if Prix < 50 :
        return "Bon marché"
    elif 50 <= Prix <= 200 :
        return "Moyen"
    elif Prix > 200 :
        return "Luxe"

df["Catégorie de prix"] = df["Prix"].apply(categoriePrix)
nbrProduit = df.groupby("Catégorie de prix")["Produit"].count().reset_index()
#plt.pie(
#   nbrProduit["Produit"],
#    labels = nbrProduit["Catégorie de prix"],
#    autopct = "%1.1f%%",
#    startangle = 90,
#    colors = ["lightblue", "lightpink", "lightgray"]
#)
# 6 #
axs[1, 0].pie(
   nbrProduit["Produit"],
    labels = nbrProduit["Catégorie de prix"],
    autopct = "%1.1f%%",
    startangle = 90,
    colors = ["lightblue", "lightpink", "lightgray"]
)
axs[1, 0].set_title("Répartition des catégories de prix")
####

#5

#plt.hist(df["Quantité"], bins=8, color="lightblue", edgecolor="black", alpha=0.5)
# 6 #
axs[1, 1].hist(df["Quantité"], bins=8, color="lightblue", edgecolor="black", alpha=0.5)
axs[1, 1].set_title("Histogramme des quantités vendues")
#####
plt.tight_layout()


#last

plt.savefig("C:/Users/HP/Desktop/Matplotlib/test.png", dpi=300, bbox_inches="tight")
plt.show()






