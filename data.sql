create database zoo_enc_db;

use zoo_enc_db;

CREATE TABLE Habitat (
    IdHab INT PRIMARY KEY AUTO_INCREMENT,
    NomHab VARCHAR(100) NOT NULL UNIQUE,
    Description_Hab VARCHAR(500) NOT NULL
);

CREATE TABLE Animal (
    IdAnimal INT PRIMARY KEY AUTO_INCREMENT,
    NomAnimal VARCHAR(100) NOT NULL,
    Type_alimentaire VARCHAR(50) not null,
    Url_image VARCHAR(100) not null,
    IdHab INT NOT NULL,
    constraint fk_habite FOREIGN KEY (IdHab) REFERENCES Habitat(IdHab),
    constraint ch_typeanimal check (
        Type_alimentaire = "Carnivore" or Type_alimentaire = "Herbivore"  or Type_alimentaire = "Omnivore"
    )
);
