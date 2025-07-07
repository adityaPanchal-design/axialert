-- Create database for simple user authentication
CREATE DATABASE IF NOT EXISTS simple_user_auth CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE simple_user_auth;

-- Create users table with only username and password
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('police', 'common') NOT NULL DEFAULT 'common',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
