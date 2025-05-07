a=int(input("Entrer le 1ere nombre : "))
b=int(input("Enter le 2eme nombre : "))
X=str(input("Entrer opération à utiliser : "))
match X :
  case "+" :
    print("a + b = ",a+b)
  case "-" :
    print("a - b = ",a-b)
  case "/" :
    print("a / b = ",a/b)
  case "*" :
    print("a * b = ",a*b)
  case _ :
    print("Unknown operation")
