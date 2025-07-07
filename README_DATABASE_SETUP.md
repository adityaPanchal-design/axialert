# Database Setup Instructions for User Authentication

This project uses MySQL database to store user registration and login details.

## Creating the Database and Table

1. Open XAMPP Control Panel and start the MySQL service.

2. Open phpMyAdmin by navigating to: `http://localhost/phpmyadmin`

3. In phpMyAdmin, click on the "SQL" tab to run SQL queries.

4. Copy and paste the following SQL commands and execute them:

```sql
CREATE DATABASE user_auth CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE user_auth;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('police', 'common') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Notes

- Make sure MySQL is running in XAMPP before executing the commands.

- The `users` table stores username, hashed password, user type, and creation timestamp.

- You will need backend code (e.g., PHP, Node.js) to interact with this database for registration and login functionality.

If you need help with backend integration, please let me know.
