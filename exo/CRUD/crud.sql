-- Create the database with utf8_general_ci collation
CREATE DATABASE IF NOT EXISTS crud
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

-- Use the created database
USE crud;

-- Create the 'livre' table
CREATE TABLE IF NOT EXISTS livre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    ISBN VARCHAR(50) NOT NULL,
    resume TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
