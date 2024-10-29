CREATE DATABASE IF NOT EXISTS LuxoMaquiagem;

USE LuxoMaquiagem;

CREATE TABLE IF NOT EXISTS Maquiagem (
    id_maquiagem INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    produto VARCHAR(50) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

INSERT INTO Maquiagem (marca, produto, preco) VALUES
('Dior', 'Batom Rouge', 189.90),
('YSL', 'Máscara Volume', 229.90),
('Mac', 'Base radiance serum-powered', 263.90);
