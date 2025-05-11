-- Création de la table animals
CREATE TABLE IF NOT EXISTS animals (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    species VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    health_status VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertion des données initiales
INSERT INTO animals (name, species, birthdate, health_status, created_at, updated_at) VALUES
('Bella', 'Vache', '2020-05-15', 'Bonne santé', NOW(), NOW()),
('Mouton 1', 'Mouton', '2019-03-10', 'Vacciné', NOW(), NOW()),
('Poulette', 'Poulet', '2021-07-20', 'Malade', NOW(), NOW());

-- Exemple de requêtes CRUD

-- Sélectionner tous les animaux
SELECT * FROM animals;

-- Ajouter un nouvel animal
INSERT INTO animals (name, species, birthdate, health_status) VALUES
('Nouveau Animal', 'Espèce', '2024-01-01', 'État de santé');

-- Mettre à jour un animal
UPDATE animals
SET name = 'Animal Modifié', health_status = 'État modifié'
WHERE id = 1;

-- Supprimer un animal
DELETE FROM animals WHERE id = 1;
