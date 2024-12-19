// borrow_book.php
<?php
require_once('koneksi.php'); // Database connection

header('Content-Type: application/json');

// Check if the required POST data exists
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];    // User ID from the request
    $book_id = $_POST['book_id'];    // Book ID from the request
    $borrow_date = date('Y-m-d');    // Get today's date as borrow date

    // Calculate the return date (14 days after borrow date)
    $return_date = date('Y-m-d', strtotime($borrow_date . ' + 14 days'));

    // Insert a new record into the transactions table
    $sql = "INSERT INTO transactions (user_id, book_id, borrow_date, return_date, status)
            VALUES (?, ?, ?, ?, 'Borrowed')";

    // Prepare the query and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiss', $user_id, $book_id, $borrow_date, $return_date);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Book borrowed successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to borrow the book.']);
    }
}
?>