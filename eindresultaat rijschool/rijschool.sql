CREATE DATABASE rijschool

CREATE TABLE rijschoolhouder
(
    rijschoolhouderID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    gebruikersnaam varchar(255) NOT NULL,
    wachtwoord varchar(255) NOT NULL
);

CREATE TABLE adres
(
    adresID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    straatnaam VARCHAR(255) NOT NULL,
    huisnummer INT(11) NOT NULL,
    postcode VARCHAR(255) NOT NULL,
    woonplaats VARCHAR(255) NOT NULL
);

CREATE TABLE autos
(
    autoID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    auto_merk VARCHAR(255) NOT NULL,
    auto_type VARCHAR(255) NOT NULL,
    kenteken VARCHAR(255) NOT NULL,
    beschikbaar BIT NOT NULL,
    onderhoud VARCHAR(255)
);

CREATE TABLE instructeurs
(
    instructeurID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    adresID INT(11),
    autoID INT(11),
    gebruikersnaam VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    FOREIGN KEY(adresID) REFERENCES adres(adresID),
    FOREIGN KEY(autoID) REFERENCES autos(autoID) ON DELETE CASCADE
);

CREATE TABLE klanten
(
    klantID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    adresID int(11),
    naam VARCHAR(255),
    gebruikersnaam VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    wachtwoord VARCHAR(255) NOT NULL,
    FOREIGN KEY(adresID) REFERENCES adres(adresID)
);

CREATE TABLE lessen
(
    lesID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    instructeurID INT(11),
    klantID INT(11),
    autoID INT(11),
    ophaallocatie VARCHAR(255) NOT NULL,
    datum DATE NOT NULL,
    starttijd TIME NOT NULL,
    eindtijd TIME NOT NULL,
    doel LONGTEXT NOT NULL,
    onderwerpen LONGTEXT,
    FOREIGN KEY(instructeurID) REFERENCES instructeurs(instructeurID),
    FOREIGN KEY(klantID) REFERENCES klanten(klantID),
    FOREIGN KEY(autoID) REFERENCES autos(autoID) ON DELETE CASCADE
);

CREATE TABLE examen
(
    examenID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    instructeurID INT(11),
    klantID INT(11),
    datum DATE NOT NULL,
    tijd TIME NOT NULL,
    resultaat BIT NOT NULL,
    FOREIGN KEY(instructeurID) REFERENCES instructeurs(instructeurID),
    FOREIGN KEY(klantID) REFERENCES klanten(klantID)
);

CREATE TABLE omzet
(
    omzetID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    klantID INT(11),
    examenID INT(11),
    slagingspercentage DECIMAL(3,2) NOT NULL,
    FOREIGN KEY(klantID) REFERENCES klanten(klantID),
    FOREIGN KEY(examenID) REFERENCES examen(examenID)
);

CREATE TABLE i_mededelingen
(
    i_mededelingID BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titel VARCHAR(255) NOT NULL,
    inhoud LONGTEXT NOT NULL

);

CREATE TABLE l_mededelingen
(
    l_mededelingID BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titel VARCHAR(255) NOT NULL,
    inhoud LONGTEXT NOT NULL
);