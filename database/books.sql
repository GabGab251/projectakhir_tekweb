CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    isbn VARCHAR(13),
    author VARCHAR(100),
    category VARCHAR(50),
    synopsis TEXT,
    pages INT,
    cover_image VARCHAR(255),
    location VARCHAR(100),
    status ENUM('Tersedia', 'Sedang Dipinjam') DEFAULT 'Tersedia'
);

-- Insert example books
INSERT INTO books (title, isbn, author, category, synopsis, pages, cover_image, location, status) VALUES
('The Great Gatsby', '9780743273565', 'F. Scott Fitzgerald', 'Fiction', 'A classic novel set in the Roaring Twenties about love, wealth, and social upheaval.', 180, 'gatsby.jpg', 'Shelf A1', 'Tersedia'),
('1984', '9780451524935', 'George Orwell', 'Dystopian', 'A dystopian novel set in a totalitarian society under constant surveillance.', 328, '1984.jpg', 'Shelf B2', 'Tersedia'),
('To Kill a Mockingbird', '9780060935467', 'Harper Lee', 'Fiction', 'A moving story about racial injustice and childhood in the Deep South.', 281, 'mockingbird.jpg', 'Shelf C3', 'Tersedia'),
('The Catcher in the Rye', '9780316769488', 'J.D. Salinger', 'Fiction', 'The story of a young man''s journey through the complexities of adolescence.', 277, 'catcher.jpg', 'Shelf D4', 'Sedang Dipinjam'),
('Pride and Prejudice', '9780141439518', 'Jane Austen', 'Romance', 'A romantic novel about love, family, and social class.', 279, 'pride.jpg', 'Shelf E5', 'Tersedia'),
('The Hobbit', '9780547928227', 'J.R.R. Tolkien', 'Fantasy', 'A fantasy adventure about Bilbo Baggins and his journey to reclaim a treasure guarded by a dragon.', 310, 'hobbit.jpg', 'Shelf F6', 'Tersedia'),
('The Alchemist', '9780061122415', 'Paulo Coelho', 'Philosophy', 'A philosophical story about following your dreams and personal legend.', 208, 'alchemist.jpg', 'Shelf H8', 'Sedang Dipinjam'),
('War and Peace', '9780199232765', 'Leo Tolstoy', 'Historical Fiction', 'A sweeping historical epic about the lives of aristocratic families during the Napoleonic Wars.', 1225, 'warpeace.jpg', 'Shelf I9', 'Tersedia'),
('The Little Prince', '9780156012195', 'Antoine de Saint-Exupéry', 'Children', 'A poetic tale about love, loss, and seeing the world through the eyes of a child.', 96, 'littleprince.jpg', 'Shelf J10', 'Tersedia');
