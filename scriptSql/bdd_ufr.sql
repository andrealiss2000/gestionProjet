CREATE TABLE Compte(
   num_compte INT,
   id_compte INT,
   mdp_compte VARCHAR(50),
   type_compte LOGICAL,
   PRIMARY KEY(num_compte), 
   adminCompte BOOLEAN NOT NULL
);

CREATE TABLE Vague(
   num_vague INT,
   horaire DATETIME,
   PRIMARY KEY(num_vague)
);

CREATE TABLE Etudiant(
   num_etudiant INT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   num_TD INT,
   PRIMARY KEY(num_etudiant)
);

CREATE TABLE Salle(
   designation INT,
   lieu VARCHAR(50),
   etage INT,
   batiment VARCHAR(50),
   capacite_ordi VARCHAR(50),
   PRIMARY KEY(designation)
);

CREATE TABLE Domaine(
   num_domaine INT,
   libelle_domaine VARCHAR(50),
   PRIMARY KEY(num_domaine)
);


CREATE TABLE Sous_domaine(
   num_sous_domaine INT,
   libelle_sous_domaine VARCHAR(50),
   num_domaine INT NOT NULL,
   PRIMARY KEY(num_sous_domaine),
   FOREIGN KEY(num_domaine) REFERENCES Domaine(num_domaine)
);

CREATE TABLE Lot(
   num_lot_copie INT,
   num_vague INT NOT NULL,
   num_compte INT NOT NULL,
   PRIMARY KEY(num_lot_copie),
   FOREIGN KEY(num_vague) REFERENCES Vague(num_vague),
   FOREIGN KEY(num_compte) REFERENCES Compte(num_compte)
);

CREATE TABLE Copie(
   num_copie INT,
   num_etudiant INT NOT NULL,
   num_lot_copie INT NOT NULL,
   PRIMARY KEY(num_copie),
   FOREIGN KEY(num_etudiant) REFERENCES Etudiant(num_etudiant),
   FOREIGN KEY(num_lot_copie) REFERENCES Lot(num_lot_copie)
);

CREATE TABLE etudiant_salle(
   num_etudiant INT,
   designation INT,
   PRIMARY KEY(num_etudiant, designation),
   FOREIGN KEY(num_etudiant) REFERENCES Etudiant(num_etudiant),
   FOREIGN KEY(designation) REFERENCES Salle(designation)
);

CREATE TABLE copie_domaine(
   num_copie INT,
   num_sous_domaine INT,
   note_sous_domaine DOUBLE,
   PRIMARY KEY(num_copie, num_sous_domaine),
   FOREIGN KEY(num_copie) REFERENCES Copie(num_copie),
   FOREIGN KEY(num_sous_domaine) REFERENCES Sous_domaine(num_sous_domaine)
);


/** JEUX DE TESTS **/

INSERT INTO compte(num_compte, id_compte, mdp_compte, type_compte, adminCompte) VALUES ("admin","admin","admin","admin",1);
INSERT INTO compte(num_compte, id_compte, mdp_compte, type_compte, adminCompte) VALUES ("testCorrecteur","testCorrecteur","test","test",0);
