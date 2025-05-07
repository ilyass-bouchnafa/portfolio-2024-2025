SELECT Parent
FROM PARENTS
GROUP BY Parent
HAVING COUNT(Fils) >= 2;
SELECT AVG(Age) AS AgeMoyen
FROM PERSONNE
WHERE Nom IN (
    SELECT Parent
    FROM PARENTS
    WHERE Fils = 'HIBA'
    );
 SELECT SUM(Revenu)
FROM PERSONNE
WHERE Nom IN (
    SELECT Fils
    FROM PARENTS
    WHERE Parent='Houda'
    OR Parent='Ismail'
    );
SELECT Parent, COUNT(Fils)
FROM PARENTS
GROUP BY Parent;
SELECT Nom, Revenu
FROM PERSONNE
WHERE Nom IN (
    SELECT Parent
    FROM PARENTS
    GROUP BY Parent
    HAVING COUNT(Fils) >= 2
    );
SELECT Nom, Revenu
FROM PERSONNE
WHERE Nom IN (
    SELECT P1.Parent
    FROM PARENTS P1, PARENTS P2
    WHERE P1.Parent <> P2.Parent
    AND P1.Fils = P2.Fils
    );




