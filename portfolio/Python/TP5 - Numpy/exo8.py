import numpy as np

A = np.array([[2,3,-1],[4,1,2],[-3,2,4]])
B = np.array([5,6,8])
result = np.linalg.solve(A,B)
print(f"x = {np.round(result[0],2)}, y = {round(result[1],2)}, z = {round(result[2],2)}")
