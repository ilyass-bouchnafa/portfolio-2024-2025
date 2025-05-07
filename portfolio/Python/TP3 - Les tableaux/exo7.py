"""def palindrome(ch) :
  N = len(ch)
  result = False
  for i in range(0,N,1) :
    for j in range(N-1,0,-1) :
      if ch[i] == ch[j] :
        result = True
  if result :
    print("Cette chaine est palindrome")
  else :
    print("Cette chaine n'est pas palindrome")"""


def palindrome(ch) :
  N = len(ch)
  result = True
  for i in range(0,N//2) :
    if ch[i] != ch[N-i-1] :
      result = False
      break
  if result :
    print("Cette chaine est palindrome")
  else :
    print("Cette chaine n'est pas palindrome")

ch = input("Entrer un chaine : ")
palindrome(ch)
