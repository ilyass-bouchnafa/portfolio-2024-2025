SELECT Nom, Revenu 
FROM PERSONNE
WHERE Nom IN (
    SELECT Parent
    FROM PARENTS 
    WHERE Fils = 'Omar'
    );
SELECT P1.Fils AS PetitFils, P2.Parent AS GrandPere
    FROM PARENTS P1, PARENTS P2
    WHERE P1.Fils = 'Omar'
    AND P1.Parent = P2.Fils;
SELECT DISTINCT P1.Fils
    FROM PARENTS P1, PARENTS P2, PARENTS P3
    WHERE P2.Parent = 'Otmane'
    AND P3.Parent = 'Hiba'
    AND P1.Fils = P2.Fils
    AND P1.Fils = P3.Fils;
SELECT P1.Fils AS PetitFils, P2.Parent AS GrandPere
    FROM PARENTS P1, PARENTS P2
    WHERE (P1.Fils = 'Omar' OR P1.Fils = 'Abdoullah')
    AND P1.Parent = P2.Fils;
SELECT DISTINCT P1.Fils AS Frere1, P2.Fils AS Frere2
    FROM PARENTS P1, PARENTS P2
    WHERE P1.Parent = P2.Parent
    AND P1.Fils < P2.Fils;
SELECT P1.Fils, P2.Fils AS Frere
    FROM PARENTS P1, PARENTS P2
    WHERE P1.Parent = P2.Parent
    AND P1.Fils = 'Hiba'
    AND P2.Fils <> 'Hiba';
SELECT DISTINCT P1.Fils AS Frere, P2.Fils AS Soeur
    FROM PARENTS P1, PARENTS P2
    WHERE P1.Parent = P2.Parent
    AND P1.Fils <> P2.Fils
    AND P1.Fils IN (
        SELECT Nom
        FROM PERSONNE
        WHERE Sexe='M'
        )
    AND P2.Fils IN (
        SELECT Nom
        FROM PERSONNE
        WHERE Sexe='F'
        );
