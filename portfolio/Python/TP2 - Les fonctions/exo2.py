def factorial(A) :
  result = 1
  for i in range(A,1,-1) :
    result *= i
  return result
n=int(input("Entrer un nombre :"))
while n < 0 :
  n=int(input("Entrer un nombre :"))
result = factorial(n)
print(n,"!= ",result)


