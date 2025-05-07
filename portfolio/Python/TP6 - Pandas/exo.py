import pandas as pd
import numpy as np
df = pd.read_csv("ventes.csv")
print(df)

df_Five = df.head(5)
print(df_Five)

info = df.info()
print(info)

description = df.describe()
print(description)

df_NA = df[df["Client"].isnull()]
print(df_NA)

df_Client = df["Client"].fillna("Client inconnu")
print(df_Client)
df_Ville = df["Ville"].fillna("Ville inconnue")
print(df_Ville)

df["Date"] = pd.to_datetime(df["Date"], dayfirst=True) #pd.to_datetime(df["Date"], format='"%d/%m/%y")
df["Mois"] = df["Date"].dt.month
print(df)

df = df[(df["Quantité"] > 0) & (df["Prix"] > 0)]
print(df)

df["Total"] = df["Prix"] * df["Quantité"]
#df["Total_2"] = df.apply(lambda row : row["Prix"] * row["Quantité"], axis=1)  //Méthode 2
print(df)

chiffreAffaire = df.groupby("Ville")["Total"].sum()
print(chiffreAffaire)

moyenneVente = df.groupby("Mois")["Total"].mean()
print(moyenneVente)

df_Sorted = df.sort_values(by=["Quantité"], ascending=False).head(5)
print(df_Sorted)

df.to_csv("ventes_nettoyees.csv")

#Bonus
#1
def Saison(Mois) :
    if 4 <= Mois <= 5 :
        return 'Printemps'
    elif 6 <= Mois <= 8 :
        return 'Ete'
    elif 9 <= Mois <= 11 :
        return 'Automne'
    elif Mois == 12 or 1 <= Mois <= 2 :
        return 'Hiver'

df["Saison"] = df["Mois"].apply(Saison)
print(df)

chiffreAffaireSaison = df.groupby("Saison")["Total"].sum()
print(chiffreAffaireSaison)

#2 !! incomplet
#clientRegulier = df.groupby("Client")[""]
#print(clientRegulier)

#3 !! incomplet
"""ProduitMaxVille = df.groupby(["Ville", "Produit"])["Quantité"].sum()
ppppp = ProduitMaxVille.groupby(["Ville", "Produit"])["Quantité"].max()
print(ProduitMaxVille)"""

#Deuxième Partie du TP :Exploration Avancée avec Pandas
#Etape1 :
#1
df = df[(df["Prix"] <= 1000) & (df["Quantité"] >= 1)]
print(df)
df = df.dropna(subset=["Client"])
print(df)
#2
df_doublons1 = df.duplicated(subset=["Produit", "Client"])
print(df_doublons1)
df_drop_doublons1 = df.drop_duplicates(subset=["Produit", "Client"])
print(df_drop_doublons1)
df_doublons2 = df.duplicated(subset=["Ville","Date"])
print(df_doublons2)
df_drop_doublons2 = df.drop_duplicates(subset=["Ville", "Date"])
print(df_drop_doublons2)
#3
df = df[(df["Prix"].notnull()) & (df["Quantité"].notnull())]
print(df)
#4
df["Valide"] = df["Quantité"].apply(lambda x : "Valide" if x > 0 else "Non valide")
print(df)
df = df[df["Valide"] != "Non valide"]
print(df)
#Etape :2
#1
def CategoriePrix(prix) :
    if prix < 50 :
        return "Bon marché"
    elif 50 <= prix <= 200 :
        return "Moyen"
    elif prix > 200 :
        return "Luxe"

df["Catégorie de prix"] = df["Prix"].apply(CategoriePrix)
print(df)
#2
def performance(prix, quantite) :
    total = prix * quantite
    if total > 1000 :
        return "Excellent"
    elif 500 <= total <= 1000 :
        return "Moyen"
    else :
        return "Faible"

df["Performance"] = df.apply(lambda row : performance(row["Prix"], row["Quantité"]), axis=1)
print(df)
####### METHODE 2 ########
conditions = [
    (df["Total"] > 1000),
    (500 <= df["Total"]) & (df["Total"] <= 1000),
    (df["Total"] < 500)
]
choix = ["Excellent", "Moyen", "Faible"]
df["Performance²"] = np.select(conditions, choix, default="Inconnu")
print(df)
#3
df["Date"] = pd.to_datetime(df["Date"], format='%d/%m/%Y')
current_date = pd.to_datetime('08/12/2024', format='%d/%m/%Y')
df["Statut de livraison"] = df["Date"].apply(lambda x: "Livré" if x <= current_date else "En cours")
print(df)
#4
commandesClient = df["Client"].value_counts()
anciensClients = commandesClient[commandesClient >= 3].index #.index retourne un objet Index de pandas, qui fonctionne comme un tableau des indices, mais il peut être converti facilement en liste ou en tableau NumPy si besoin.
df["Type de client"] = df["Client"].apply(lambda x: "Ancien client" if x in anciensClients else "Nouveau client")
print(df)
#Etape 3:
#5
df = df.reindex(columns=["Client", "Produit", "Catégorie de prix", "Prix", "Quantité", "Performance", "Ville", "Statut de livraison","Date","Total"])
print(df)
#6
grouped = df.groupby(["Ville", "Produit"])["Quantité"].sum().reset_index()
print(grouped)
plusVendu = grouped.loc[grouped.groupby("Ville")["Quantité"].idxmax()] #idxmax() de Pandas est utilisée pour renvoyer l'indice de la première occurrence de la valeur maximale dans une série ou un DataFrame.
print(plusVendu)
#7
df = df.sort_values(by=["Client", "Date"])
df = df.reset_index(drop=True)
print(df)
#8
df["Difference"] = df.groupby("Client")["Total"].shift() - df["Total"] #shift() permet d'obtenir la valeur de la commande précédente
print(df)
#print(df.groupby("Client")["Total"].shift())
#print(df["Total"])









        












