CREATE TABLE `ifsp`.`users` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- insejão de dados
INSERT INTO `users` (username, email, password) VALUES ('admin', 'admin@gmail.com', 'password');
INSERT INTO `users` (username, email, password) VALUES ('user', 'user@gmail.com', 'password');