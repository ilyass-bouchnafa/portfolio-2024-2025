import matplotlib.pyplot as plt

Mois =  ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", 
"Nov", "Dec"] 
Ventes = [500, 600, 750, 800, 950, 1000, 1100, 1150, 1200, 1300, 1350, 
1400]

plt.plot(Mois, Ventes, color="red", linestyle="--", marker="o")

plt.title("L'évolution des ventes sur 12 mois")
plt.xlabel("Mois")
plt.ylabel("Ventes")
plt.show()