CREATE DATABASE zoo_enc_db;
USE zoo_enc_db;

CREATE TABLE Habitat (
    IdHab INT PRIMARY KEY AUTO_INCREMENT,
    NomHab VARCHAR(100) NOT NULL UNIQUE,
    Description_Hab VARCHAR(500) NOT NULL
);


CREATE TABLE Animal (
    IdAnimal INT PRIMARY KEY AUTO_INCREMENT,
    NomAnimal VARCHAR(100) NOT NULL,
    Type_alimentaire VARCHAR(50) NOT NULL,
    Url_image VARCHAR(255) NOT NULL,
    IdHab INT NOT NULL,
    CONSTRAINT fk_habitat FOREIGN KEY (IdHab) REFERENCES Habitat(IdHab),
    CONSTRAINT ch_typeanimal CHECK (
        Type_alimentaire IN ('Carnivore', 'Herbivore', 'Omnivore')
    )
);

INSERT INTO Habitat (NomHab, Description_Hab) VALUES 
('Savane', 'Une savane est une vaste étendue d''herbes, souvent tropicale, parsemée d''arbres ou d''arbustes clairsemés.'),
('Jungle', 'La jungle est une forêt tropicale humide, dense et luxuriante, caractérisée par une biodiversité exceptionnelle.'),
('Désert', 'Un désert est une région très sèche, avec peu de précipitations et une forte évaporation.'),
('Océan', 'Un océan est une vaste étendue d''eau salée couvrant 71% de la surface de la Terre.');


INSERT INTO Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) VALUES
('lion africain', 'Carnivore', 'https://zoo-assets.com/savane/lion_africain.png', 1),
('tigre', 'Carnivore', 'https://zoo-assets.com/savane/tigre.png', 1),
('zèbre', 'Herbivore', 'https://zoo-assets.com/savane/zebre.png', 1),
('pingouin', 'Carnivore', 'https://zoo-assets.com/ocean/pingouin.png', 4),
('panda', 'Herbivore', 'https://zoo-assets.com/jungle/panda.png', 2),
('tortue', 'Herbivore', 'https://zoo-assets.com/jungle/tortue.png', 2);















