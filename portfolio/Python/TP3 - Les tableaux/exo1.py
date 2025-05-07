import math

nombres = [1,2,3,4,5]

nombres.append(6)

print(nombres)

nombres.pop(2)

print(nombres)

squared_numbers = []

for i in nombres :
  squared_numbers.append(pow(i,2))

print(squared_numbers)