CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    isbn VARCHAR(13),
    author VARCHAR(100),
    category VARCHAR(50),
    synopsis TEXT,
    pages INT,
    cover VARCHAR(255),
    location VARCHAR(100),
    status TINYINT(4) DEFAULT 1  -- 1 default untuk 'Tersedia'
);

INSERT INTO books (title, isbn, author, category, synopsis, pages, cover, location, status) 
VALUES 
('The Great Gatsby', '9780743273565', 'F. Scott Fitzgerald', 'Fiction', 'A classic novel set in the Roaring Twenties about love, wealth, and social upheaval.', 180, 'gatsby.jpg', 'Shelf A1', 1),
('1984', '9780451524935', 'George Orwell', 'Dystopian', 'A dystopian novel set in a totalitarian society under constant surveillance.', 328, '1984.jpeg', 'Shelf B2', 1),
('To Kill a Mockingbird', '9780060935467', 'Harper Lee', 'Fiction', 'A moving story about racial injustice and childhood in the Deep South.', 281, 'mockingbird.jpg', 'Shelf C3', 1),
('The Catcher in the Rye', '9780316769488', 'J.D. Salinger', 'Fiction', 'The story of a young man''s journey through the complexities of adolescence.', 277, 'catcher.png', 'Shelf D4', 0),
('Pride and Prejudice', '9780141439518', 'Jane Austen', 'Romance', 'A romantic novel about love, family, and social class.', 279, 'pride.jpg', 'Shelf E5', 1),
('The Hobbit', '9780547928227', 'J.R.R. Tolkien', 'Fantasy', 'A fantasy adventure about Bilbo Baggins and his journey to reclaim a treasure guarded by a dragon.', 310, 'hobbit.jpg', 'Shelf F6', 1)


