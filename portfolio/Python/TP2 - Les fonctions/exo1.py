def grade_student(score) :
  result = ""
  if 90 <= score <= 100 :
    result = 'A'
  elif 80 <= score <= 89 :
    result = 'B'
  elif 70 <= score <= 79 :
    result = 'C'
  elif 60 <= score <= 69 :
    result = 'D'
  elif 0 <= score <= 59 :
    result = "Téléobjectif"
  return result 
N=int(input("Entrer votre score : "))
result = grade_student(N)
print("Votre note est : ",result)    