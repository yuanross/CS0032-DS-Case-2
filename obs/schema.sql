CREATE DATABASE IF NOT EXISTS obs_db;
USE obs_db;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('customer','admin') NOT NULL DEFAULT 'customer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE books (
  book_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  isbn VARCHAR(50) NOT NULL UNIQUE,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO books (title, author, isbn, price, description) VALUES
('The Pragmatic Programmer', 'Andrew Hunt', '978-0201616224', 899.00, 'Classic book on pragmatic software development.'),
('Clean Code', 'Robert C. Martin', '978-0132350884', 799.00, 'A handbook of agile software craftsmanship.'),
('Introduction to Algorithms', 'Cormen et al.', '978-0262033848', 1299.00, 'Comprehensive algorithms textbook.'),
('Design Patterns', 'Erich Gamma', '978-0201633610', 999.00, 'Elements of reusable object-oriented software.');
