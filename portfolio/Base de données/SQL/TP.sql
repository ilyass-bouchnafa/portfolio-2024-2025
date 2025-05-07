1)

CREATE DATABASE HOPITALE;
USE HOPITALE;
CREATE TABLE ASSISTED_PATIENT (
	PatientCod INT NOT NULL CONSTRAINT PK_AP PRIMARY KEY,
	Nom VARCHAR(20),
	Date_de_Naissance DATE,
	Type_Assistance VARCHAR(20)
);

CREATE TABLE ASSISTANCE_REQUEST (
	RequestCod INT NOT NULL CONSTRAINT PK_AR PRIMARY KEY,
	PatientCod INT NOT NULL REFERENCES ASSISTED_PATIENT(PatientCod),
	Assistance_Type VARCHAR(20),
	RequestDate DATE,
	HeureDemande TIME
);

CREATE TABLE SYMPTOMS_CLASSIFICATION (
	SymptomCode INT NOT NULL CONSTRAINT PK_SC PRIMARY KEY,
	SymptomType VARCHAR(20),
	SeverityLevel INT
);

CREATE TABLE LIST_SYMPTOMES (
	RequestCod INT NOT NULL,
	SymptomCode INT NOT NULL,
	FOREIGN KEY (RequestCode) REFERENCES ASSISTANCE_REQUEST(RequestCod),
	FOREIGN KEY (SymptomCode) REFERENCES REFERENCES SYMPTOMS_CLASSIFICATION(SymptomCode),
	CONSTRAINT PK_LS PRIMARY KEY (RequestCod,SymptomCode)
);

CREATE TABLE GARDE_DOCTOR (
	Date DATE NOT NULL,
	CodeQUIP INT NOT NULL,
	Code_medecin INT NOT NULL,
	CONSTRAINT PK_GD PRIMARY KEY (Date, CodeQUIP, Code_medecin)
);

CREATE TABLE EQUIPE (
	CodeQUIP INT NOT NULL REFERENCES GARDE_DOCTOR(CodeQUIP),
	StartTime TIME,
	EndTime TIME
);

CREATE TABLE NON_URGENT_VISITS (
	RequestCod INT NOT NULL REFERENCES ASSISTANCE_REQUEST(RequestCod),
	CONSTRAINT PK_NUV PRIMARY KEY (RequestCod)
);

CREATE TABLE VISITES_PLANIFIEES (
	RequestCod INT NOT NULL REFERENCES ASSISTANCE_REQUEST(RequestCod),
	Code_Medecin INT NOT NULL REFERENCES GARDE_DOCTOR(Code_medecin),
	CONSTRAINT PK_VP PRIMARY KEY (RequestCod, Code_Medecin)
);


2)

a/
SELECT COUNT(RequestCod) AS Demande_Non_Urgent
FROM ASSISTANCE_REQUEST
WHERE RequestCod IN (
	SELECT RequestCod
	FROM NON_URGENT_VISITS
);

b/
SELECT PatientCod
FROM ASSISTED_PATIENT
WHERE PatientCod IN (
	SELECT PatientCod
	FROM ASSISTANCE_REQUEST
	WHERE RequestCod IN (
		SELECT RequestCod 
		FROM VISITES_PLANIFIEES
		GROUP BY RequestCod
		HAVING COUNT(Code_Medecin) = 1
	)
);

c/
SELECT SymptomType
FROM SYMPTOMS_CLASSIFICATION
WHERE SymptomCode NOT IN (
	SELECT SymptomCode 
	FROM LIST_SYMPTOMES
	WHERE RequestCod IN (
		SELECT RequestCod
		FROM NON_URGENT_VISITS
	)
);

###########################################################################################
Examen 2022-2023

(a)
R1 = SELECTION(ET, DegreeGrade > 105)
R2 = JOINTURE(EPARDOC,CDOC, EPARDOC.CodD = CDOC.CodD AND EPARDOC.CodC = CDOC.CodD)
R3 = JOINTURE(R2,R2, R2.CodC1 = R2.CodC2 AND R2.CodD1 <> R2.CodD2  AND R2.DatePublication1 = R2.DatePublication2)
R4 = JOINTURE(R3,R1, R3.MatrS = R1.Matrs)
RESULT = PROJECTION(R4, Matrs, NameS)

(b)
1/
CREATE DATABASE DOCTORAL;
USE DOCTORAL;
CREATE TABLE ETUDIANTS (
	MatrS INT NOT NULL CONTRAINT PK_Etudiant PRIMARY KEY,
	NameS VARCHAR(20) NOT NULL,
	DegreeYear INT NOT NULL,
	Study_Title VARCHAR(20) NOT NULL,
	DegreeGrade INT NOT NULL
);
CREATE TABLE DEPARTEMENT (
	CodD INT NOT NULL CONSTRAINT PK_Departement PRIMARY KEY,
	NameD VARCHAR(20) NOT NULL,
	Scientifique_Secteur VARCHAR(20) NOT NULL,
	NbreProfessors INT NOT NULL
);
CREATE TABLE CONCOURS_DOCTORAL (
	CodC INT NOT NULL CONSTRAINT PK_CDOC PRIMARY KEY,
	CodD INT NOT NULL REFERENCES DEPARTEMENT(CodD),
	DatePublication DATE NOT NULL,
	DateExpiration DATE NOT NULL,
	NbrDePlaceDispo INT NOT NULL
);
CREATE TABLE EPARDOC (
	CodC INT NOT NULL,
	CodD INT NOT NULL,
	MatrS INT NOT NULL,
	FOREIGN KEY (CodC) REFERENCES CDOC(CodC),
	FOREIGN KEY (CodD) REFERENCES DEPARTEMENT(CodD),
	FOREIGN KEY (MatrS) REFERENCES ETUDINT(MatrS),
	CONSTRAINT PK_EPARDOC PRIMARY KEY (CodC,CodD,MatrS),
	DateDepotCandidature DATE NOT NULL
);


(c)

1/
SELECT 
	DEPT.NameD AS DepartementName, 
	DEPT.Scientifique_Secteur AS FiliereScientifique, 
	COUNT(CDOC.CodC) NbrConcoursDoctoraux, 
	CDOC.DateExpiration AS DatePublication
FROM DEPARTEMENT AS DEPT, COUNCOURS_DOCTORAL AS CDOC
WHERE DEPT.CodD = CDOC.CodD
AND CDOC.NbrDePlaceDispo > 7
AND CDOC.DateExpiration > '31/03/2021'
GROUP BY DEPT.NameD, DEPT.Scientifique_Secteur, CDOC.DateExpiration;


2/
SELECT ET.NameS AS NomEtudiant, DEPT.Scientifique_Secteur AS DomaineScientifique
FROM ETUDIANT AS ET, DEPARTEMENT AS DEPT, EPARDOC AS X
WHERE ET.MatrS = X.MatrS
AND X.CodD = DEPT.CodD
GROUP BY ET.NameS, DEPT.Scientifique_Secteur
HAVING COUNT(DISTINCT DEPT.Scientifique_Secteur) >= 3;

###########################################################################################

EXO 1:

Dans la table CLIENT l'attribut Prive est de type booléen (True ou False) donc on peut pas avoir une valeur qui prend "No" alors cette instances est incorrecte
Dans la table SITE_WEB l'occurrence correspond à IdClient 4 n'existe pas dans la table CLIENT alors cette instance est incorrecte
Dans la table STATISTIQUE l'instance correspond au Domain salut.ma à un nombre de visiteurs 50 sans connaitre la Date (la date est NULL) donc incorrecte

EXO 2:

1/
R1 = SELECTION(HOMEWORK_TO_DELIVER, theme = 'Algèbre relationnelle')
R2 = SELECTION(HOMEWORK_DELIVERED, '2021-04-01' <= date envoi <= '2021-04-30')
R3 = JOINTURE(R1,R2, R1.codeHW = R2.codeHW)
R4 = PROJECTION(R3, CodeS, codeHW)
R5 = PROJECTION(HOMEWORK_DELIVERED, codeHW)
R6 = DIVISION(R4,R5)
R7 = JOINTURE(R6, ETUDIANT, R6.CodeS = ETUDIANT.CodeS)
RESULT = PROJECTION(R7, Nom, Prenom)

2/

###########################################################################################
Page 1 :

EXERCICE 1:

1/
R1 = SELECTION(PROVINCE, Nom = 'el haouz')
R2 = JOINTURE(DEPUTES,COMMISSIONS, DEPUTES.Commission = COMMISSIONS.Numéro)
R3 = JOINTURE(R1,R2, R1.Sigle = R2.Province)
RESULT = PROJECTION(R3, Président)

2/
R1 = SELECTION(COMMISSIONS, Nom = 'Budget')
R2 = JOINTURE(R1,DEPUTES, R1.Numéro = DEPUTES.Commission)
RESULT = PROJECTION(R2, Nom, Prénom)

3/
R1 = SELECTION(COMMISSIONS, Nom = 'Budget')
R2 = JOINTURE(R1,DEPUTES, R1.Numéro = DEPUTES.Commission)
R3 = JOINTURE(R2, PROVINCE, R2.Province = PROVINCE.Sigle)
RESULT = PROJECTION(R3, Nom, Prenom, PROVINCE.Nom)

4/
R1 = SELECTION(COMMISSIONS, Nom = 'Budget')
R2 = JOINTURE(R1,DEPUTES, R1.Numéro = DEPUTES.Commission)
R3 = JOINTURE(R2, PROVINCE, R2.Province = PROVINCE.Sigle)
RESULT = PROJECTION(R3, Nom, Prenom, PROVINCE.Nom, Région)

5/ 
R1 = JOINTURE(COLLEGE,PROVINCE, COLLEGE.Province = PROVINCE.Sigle)
R2 = REGROUPER_ET_CALCULER(R1, Région, NombreDeCollège : COUNT(Numéro))
R3 = SELECTION(R2, NombreDeCollège = 1)
R4 = JOINTURE(R3,REGIONS, R3.Région = REGIONS.Code)
R5 = JOINTURE(R4, DEPUTES, R4.Sigle = DEPUTES.PROVINCE)
RESULT = PROJECTION(R5, REGIONS.Nom, NOM, Prénom)

6/ 


























































