#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------

CREATE TABLE admin(
        idAdmin       Int  Auto_increment  NOT NULL ,
        nomAdmin      Varchar (50) NOT NULL ,
        prenomAdmin   Varchar (50) NOT NULL ,
        courrielAdmin Varchar (50) NOT NULL
	,CONSTRAINT admin_PK PRIMARY KEY (idAdmin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: labo
#------------------------------------------------------------

CREATE TABLE labo(
        idLabo       Int  Auto_increment  NOT NULL ,
        salleLabo    Varchar (50) NOT NULL ,
        telLabo      Int NOT NULL ,
        courrielLabo Varchar (50) NOT NULL ,
        idAdmin      Int NOT NULL
	,CONSTRAINT labo_PK PRIMARY KEY (idLabo)

	,CONSTRAINT labo_admin_FK FOREIGN KEY (idAdmin) REFERENCES admin(idAdmin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: medecin
#------------------------------------------------------------

CREATE TABLE medecin(
        idMedecin         Int  Auto_increment  NOT NULL ,
        nomMedecin        Varchar (50) NOT NULL ,
        prenomMedecin     Varchar (50) NOT NULL ,
        specialiteMedecin Varchar (50) NOT NULL ,
        bureauMedecin     Varchar (50) NOT NULL ,
        telMedecin        Int NOT NULL ,
        courrielMedecin   Varchar (50) NOT NULL ,
        formationCV       Varchar (50) NOT NULL ,
        experiencesCV     Varchar (50) NOT NULL ,
        idAdmin           Int NOT NULL
	,CONSTRAINT medecin_PK PRIMARY KEY (idMedecin)

	,CONSTRAINT medecin_admin_FK FOREIGN KEY (idAdmin) REFERENCES admin(idAdmin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        idClient          Int  Auto_increment  NOT NULL ,
        nomClient         Varchar (50) NOT NULL ,
        prenomClient      Varchar (50) NOT NULL ,
        courrielClient    Varchar (50) NOT NULL ,
        motDePasseClient  Varchar (50) NOT NULL ,
        adresseClient     Varchar (50) NOT NULL ,
        villeClient       Varchar (50) NOT NULL ,
        codePostalClient  Int NOT NULL ,
        paysClient        Varchar (50) NOT NULL ,
        telClient         Int NOT NULL ,
        carteVitaleClient Int NOT NULL ,
        idAdmin           Int NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (idClient)

	,CONSTRAINT Client_admin_FK FOREIGN KEY (idAdmin) REFERENCES admin(idAdmin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: creneau
#------------------------------------------------------------

CREATE TABLE creneau(
        idCreneau         Int  Auto_increment  NOT NULL ,
        dateCreneau       Date NOT NULL ,
        heureCreneau      Time NOT NULL ,
        reserveOuPas      Bool NOT NULL ,
        consultationFinie Bool NOT NULL ,
        idClient          Int ,
        idMedecin         Int ,
        idLabo            Int
	,CONSTRAINT creneau_PK PRIMARY KEY (idCreneau)

	,CONSTRAINT creneau_Client_FK FOREIGN KEY (idClient) REFERENCES Client(idClient)
	,CONSTRAINT creneau_medecin0_FK FOREIGN KEY (idMedecin) REFERENCES medecin(idMedecin)
	,CONSTRAINT creneau_labo1_FK FOREIGN KEY (idLabo) REFERENCES labo(idLabo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: compteBancaire
#------------------------------------------------------------

CREATE TABLE compteBancaire(
        idCompte                  Int  Auto_increment  NOT NULL ,
        typeCarteCompte           Varchar (50) NOT NULL ,
        numCarteCompte            Int NOT NULL ,
        nomCarteCompte            Varchar (50) NOT NULL ,
        dateExpirationCarteCompte Date NOT NULL ,
        codeSecuriteCarteCompte   Int NOT NULL ,
        idClient                  Int NOT NULL
	,CONSTRAINT compteBancaire_PK PRIMARY KEY (idCompte)

	,CONSTRAINT compteBancaire_Client_FK FOREIGN KEY (idClient) REFERENCES Client(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: serviceLabo
#------------------------------------------------------------

CREATE TABLE serviceLabo(
        idServiceLabo    Int  Auto_increment  NOT NULL ,
        nomServiceLabo   Varchar (50) NOT NULL ,
        tarifServiceLabo Float NOT NULL ,
        idLabo           Int NOT NULL
	,CONSTRAINT serviceLabo_PK PRIMARY KEY (idServiceLabo)

	,CONSTRAINT serviceLabo_labo_FK FOREIGN KEY (idLabo) REFERENCES labo(idLabo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        idMessage      Int  Auto_increment  NOT NULL ,
        contenuMessage Varchar (150) NOT NULL ,
        dateMessage    Date NOT NULL ,
        heureMessage   Time NOT NULL ,
        idMedecin      Int NOT NULL ,
        idClient       Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (idMessage)

	,CONSTRAINT message_medecin_FK FOREIGN KEY (idMedecin) REFERENCES medecin(idMedecin)
	,CONSTRAINT message_Client0_FK FOREIGN KEY (idClient) REFERENCES Client(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: paiement
#------------------------------------------------------------

CREATE TABLE paiement(
        idLabo        Int NOT NULL ,
        idCompte      Int NOT NULL ,
        idServiceLabo Int NOT NULL
	,CONSTRAINT paiement_PK PRIMARY KEY (idLabo,idCompte,idServiceLabo)

	,CONSTRAINT paiement_labo_FK FOREIGN KEY (idLabo) REFERENCES labo(idLabo)
	,CONSTRAINT paiement_compteBancaire0_FK FOREIGN KEY (idCompte) REFERENCES compteBancaire(idCompte)
	,CONSTRAINT paiement_serviceLabo1_FK FOREIGN KEY (idServiceLabo) REFERENCES serviceLabo(idServiceLabo)
)ENGINE=InnoDB;

