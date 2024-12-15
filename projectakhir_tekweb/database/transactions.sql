CREATE TABLE transactions (
    transaction_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    return_date DATE NOT NULL,
    fine_amount INT DEFAULT 0,
    payment_status ENUM('Unpaid', 'Paid') DEFAULT 'Unpaid',
    status ENUM('Borrowed', 'Returned', 'Overdue') DEFAULT 'Borrowed',
    actual_return_date DATE DEFAULT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`ID`) ON DELETE CASCADE,
    FOREIGN KEY (`book_id`) REFERENCES `books`(`id`) ON DELETE CASCADE
);


DELIMITER $$

-- Trigger to set return_date 14 days after borrow_date
CREATE TRIGGER set_return_date
BEFORE INSERT ON transactions
FOR EACH ROW
BEGIN
  SET NEW.return_date = DATE_ADD(NEW.borrow_date, INTERVAL 14 DAY);
END$$

DELIMITER ;


DELIMITER $$

-- Trigger to calculate fine and update status
CREATE TRIGGER calculate_fine
BEFORE UPDATE ON transactions
FOR EACH ROW
BEGIN
    -- Fine calculation when the book is returned
    IF NEW.actual_return_date IS NOT NULL THEN
        IF NEW.actual_return_date > NEW.return_date THEN
            SET NEW.fine_amount = DATEDIFF(NEW.actual_return_date, NEW.return_date) * 1000;
        ELSE
            SET NEW.fine_amount = 0;
        END IF;

        -- Update status to 'Returned' if the book is returned
        SET NEW.status = 'Returned';
    END IF;

    -- Update status to Overdue if the book is still borrowed and past due date
    IF NEW.status = 'Borrowed' AND CURDATE() > NEW.return_date THEN
        SET NEW.status = 'Overdue';
    END IF;
END$$

DELIMITER ;


-- Insert sample transaction data
INSERT INTO `transactions` (`user_id`, `book_id`, `borrow_date`, `status`, `actual_return_date`) VALUES
(1, 1, '2024-12-01', 'Borrowed', NULL),  -- Not yet returned
(3, 4, '2024-11-25', 'Returned', '2024-11-28'),  -- Returned on time
(4, 6, '2024-11-20', 'Overdue', NULL),  -- Still borrowed, overdue
(1, 3, '2024-12-03', 'Borrowed', NULL),  -- Not yet returned
(5, 8, '2024-11-15', 'Returned', '2024-11-18');  -- Returned on time
