import pandas as pd

#Etape 1 :Importation et exploration
df = pd.read_csv("ventes.csv")
print(df)
dfFive = df.head()
print(dfFive)
dfInfo = df.info()
print(dfInfo)

dfDescribe= df[["Prix","Quantité"]].describe()
print(dfDescribe)

#Etape2 :Nettoyage des données
#1
dfNaN = df[df["Client"].isnull()]
print(dfNaN)

df["Client"] = df["Client"].fillna("Client inconnu")
df["Ville"] = df["Ville"].fillna("Ville inconnue")
#2
df["Date"] = pd.to_datetime(df["Date"], dayfirst=True)
df["Mois"] = df["Date"].dt.month
#3
df = df[(df["Prix"] >= 0) & (df["Quantité"] >= 0)]
print(df)
#Etape3 :Analyse des données
#1
df["Total"] = df["Prix"] * df["Quantité"]
print(df)
#2
chiffreAffaires = df.groupby("Ville")["Total"].sum()
print(chiffreAffaires)
#3
moyenneVentes = df.groupby("Mois")["Total"].mean()
print(moyenneVentes)
#4
df = df.sort_values(by="Quantité", ascending=False)
dfNew = df["Produit"].head()
print(dfNew)
#Etape4 :Exportation
#1
df.to_csv("ventes_nettoyees.csv", index=False)
#Bonus
#1
def assign_season(month) :
    if 3 <= month <= 5:
        return "Printemps"
    elif 6 <= month <= 8:
        return "Été"
    elif 9 <= month <= 11:
        return "Automne"
    else:
        return "Hiver"

df["Saison"] = df["Mois"].apply(assign_season)
print(df)

chiffreAffairesSaison = df.groupby("Saison")["Total"].sum()
print(chiffreAffairesSaison)
#2
dfNew1 = df[["Client","Produit"]]
print(dfNew1)
dfNew1["Client"] = dfNew1[(df["Produit"] == "Stylo") & (df["Produit"] == "Livre") & (df["Produit"] == "Cahier")]
#dfNew1["nbrAchat"] = dfNew1.groupby("Client")["Produit"].count() 
print(dfNew1)




