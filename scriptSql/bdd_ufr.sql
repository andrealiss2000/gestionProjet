CREATE TABLE COMPTE(
idCompte INTEGER  NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(20) NOT NULL,
prenom VARCHAR(20) NOT NULL,
pseudoCompte VARCHAR(15) NOT NULL,
pwdCompte VARCHAR(40) NOT NULL,  
adminCompte BOOLEAN NOT NULL
);

CREATE TABLE LOT(
idLot INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
idCompte INTEGER,
idVague INTEGER,
FOREIGN KEY (idCompte) REFERENCES COMPTE(idCompte),
FOREIGN KEY (idVague) REFERENCES VAGUE (idVague)
);


CREATE TABLE VAGUE(
idVague INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
horaire DATE
);



CREATE TABLE ETUDIANT(
idEtudiant INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(20) NOT NULL, 
prenom VARCHAR(20) NOT NULL,
resultat_final VARCHAR(10),
numTD VARCHAR(5)
);

CREATE TABLE DOMAINE(
libelleDomaine VARCHAR(30),
PRIMARY KEY(libelleDomaine)
);

CREATE TABLE SOUS_DOMAINE(
libelleSousDomaine VARCHAR(30),
libelleDomaine VARCHAR(30),
PRIMARY KEY(libelleSousDomaine),
FOREIGN KEY (libelleDomaine) REFERENCES DOMAINE(libelleDomaine)
);

CREATE TABLE COPIE(
idCopie INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
idLot INTEGER,
idEtudiant INTEGER,
FOREIGN KEY (idLot) REFERENCES LOT(idLot),
FOREIGN KEY (idEtudiant) REFERENCES ETUDIANT(idEtudiant)	
);
	
CREATE TABLE COPIE_DOMAINE(
idCopie INTEGER NOT NULL,
libelleDomaine VARCHAR(30) NOT NULL,
noteDomaine INTEGER, 
resultat_domaine varchar(10),
FOREIGN KEY (idCopie) REFERENCES COPIE(idCopie),
FOREIGN KEY (libelleDomaine) REFERENCES DOMAINE(libelleDomaine)
);

CREATE TABLE SALLE(
designationSalle VARCHAR(30),
lieu VARCHAR(30), 
etage VARCHAR(10),
batiment VARCHAR(15),
capaciteOrdinateur INTEGER,
PRIMARY KEY(designationSalle)
);

CREATE TABLE ETUDIANT_SALLE(
designationSalle VARCHAR(30),
idEtudiant INTEGER,
PRIMARY KEY(designationSalle,idEtudiant),
FOREIGN KEY (designationSalle) REFERENCES SALLE(designationSalle),
FOREIGN KEY (idEtudiant) REFERENCES ETUDIANT(idEtudiant)

);


/** JEUX DE TESTS **/

INSERT INTO compte(nom, prenom, pseudoCompte, pwdCompte, adminCompte) VALUES ("admin","admin","admin","admin",1);
INSERT INTO compte(nom, prenom, pseudoCompte, pwdCompte, adminCompte) VALUES ("testCorrecteur","testCorrecteur","test","test",0);