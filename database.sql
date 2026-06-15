-- Create database
CREATE DATABASE IF NOT EXISTS rest_api
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE rest_api;

-- Users table (CRUD target)
CREATE TABLE users (
                       id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(100) NOT NULL,
                       email VARCHAR(150) NOT NULL UNIQUE,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tokens table (optional, for login/auth later)
CREATE TABLE tokens (
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        user_id INT UNSIGNED NOT NULL,
                        token VARCHAR(255) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
