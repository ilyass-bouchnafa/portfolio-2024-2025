SELECT Fils FROM PARENTS WHERE Parent = 'Driss';
SELECT Nom, Revenu FROM PERSONNE WHERE Age < 30;
SELECT Nom, Revenu FROM PERSONNE WHERE Sexe='M' AND Age < 30;
SELECT DISTINCT Parent
FROM PARENTS, PERSONNE
WHERE PARENTS.Parent=PERSONNE.Nom
AND Nom IN (
    SELECT Nom
    FROM PERSONNE
    WHERE Revenu > 20
    );
SELECT DISTINCT Parent
FROM PARENTS, PERSONNE
WHERE PARENTS.Parent=PERSONNE.Nom
AND PERSONNE.Revenu > 20;
SELECT P1.Fils AS PetitEnfant, P2.Parent AS GrandPere
FROM PARENTS AS P1, PARENTS AS P2
WHERE P2.Fils = P1.Parent;
SELECT DISTINCT Parent
FROM PARENTS, PERSONNE
WHERE PARENTS.Parent=PERSONNE.Nom
AND Nom IN (
    SELECT Nom
    FROM PERSONNE
    WHERE Sexe='F'
    AND Revenu > 20
    );
SELECT DISTINCT P1.Fils, P2.Parent AS Pere, P3.Parent AS Mere
    FROM PARENTS P1,PARENTS P2, PARENTS P3
    WHERE P1.Fils=P2.Fils
    AND P2.Parent IN (
        SELECT Nom
        FROM PERSONNE
        WHERE Sexe='M'
        )
    AND P1.Fils=P3.Fils
    AND P3.Parent IN (
        SELECT Nom
        FROM PERSONNE
        WHERE Sexe='F'
        );


