from tkinter import Tk, Label, Button, Entry, Radiobutton, StringVar, IntVar, Checkbutton, OptionMenu, Text, messagebox

#1
def box() :
    confirmation = messagebox.askyesno("Demamnde de confirmation", "Confirmation ?")
    if confirmation :
        messagebox.showinfo("Succès", "Formulaire soumis avec succès !")
    else :
        pass
    

def newWindow() :
    root1 = Tk()
    root1.title("New Window")
    Label(root1, text="Veuillez remplir les informations ci-dessous : ", font=("Georgia", 12)).pack()
    Label(root1, text="Nom et Prenom :", font=("Arial", 10)).pack()
    Entry(root1, width=20).pack()
    Label(root1, text="Email :", font=("Arial", 10)).pack()
    Entry(root1, width=30).pack()
    choix = StringVar(value="")
    Label(root1, text="Choisir une option : ", font=("Arial", 10)).pack()
    Radiobutton(root1, text="Option 1", variable=choix, value="1").pack()
    Radiobutton(root1, text="Option 2", variable=choix, value="2").pack()
    Radiobutton(root1, text="Option 3", variable=choix, value="3").pack()
    option_a = IntVar()
    option_b = IntVar()
    Label(root1, text="Préférences : ", font=("Arial", 10)).pack()
    Checkbutton(root1, text="Recevoir des emails",variable=option_a).pack()
    Checkbutton(root1, text="Recevoir des notifications",variable=option_b).pack()
    Label(root1, text="Choisir un plan : ", font=("Arial", 10)).pack()
    options = ["Plan A", "Plan B", "Plan C"]
    selection = StringVar(value=options[0])
    OptionMenu(root1, selection, *options ).pack(pady=10)
    Label(root1, text="Saisir un commentaire : ", font=("Arial", 10)).pack()
    Text(root1, width=40 ,height=7, font=("Arial", 12) ).pack(pady=10)
    Button(root1, text="Soumettre", command=box, bg="Lightpink" ,fg="black", font =("Arial", 12)).pack(pady=10)
    root1.mainloop()
    
root = Tk()
root.title("Application - Bienvenue")


Label(root, text = "Bienvenue dans notre application Tkinter !", font=("Georgia", 12)).pack(pady=20)

Button(root, text = "Remplir le formulaire", command=newWindow, bg = "lightblue", fg = "black", font =("Arial", 12)).pack(pady=10)

root.mainloop()
