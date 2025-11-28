-- db.sql
CREATE DATABASE bookstore;
USE bookstore;

CREATE TABLE IF NOT EXISTS books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample data
INSERT INTO books (title, author, price) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 9.99),
('To Kill a Mockingbird', 'Harper Lee', 12.50),
('1984', 'George Orwell', 8.99);