// view_transactions.php
<?php
require_once('koneksi.php'); // Database connection

header('Content-Type: application/json');

// Check if the required GET data exists
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['user_id'];  // User ID from the request

    // Query to fetch the user's transactions
    $sql = "SELECT 
                t.transaction_id, 
                t.user_id, 
                t.book_id, 
                t.borrow_date, 
                t.return_date, 
                t.fine_amount, 
                t.status,
                CASE 
                    WHEN t.status = 'Borrowed' AND CURDATE() > t.return_date THEN DATEDIFF(CURDATE(), t.return_date) * 1000
                    ELSE t.fine_amount
                END AS calculated_fine
            FROM transactions t
            WHERE t.user_id = ?";

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $transactions = [];
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }

    echo json_encode($transactions);
}
?>
