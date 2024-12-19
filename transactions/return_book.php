// return_book.php
<?php
require_once('koneksi.php'); // Database connection

header('Content-Type: application/json');

// Check if the required POST data exists
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];  // Transaction ID from the request
    $actual_return_date = $_POST['actual_return_date']; // Actual return date

    // Fetch the current return date from the transaction
    $sql = "SELECT return_date FROM transactions WHERE transaction_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaction = $result->fetch_assoc();

    // Check if the transaction exists
    if ($transaction) {
        $return_date = $transaction['return_date'];

        // Calculate fine if the book is returned late
        $fine_amount = 0;
        if ($actual_return_date > $return_date) {
            $fine_amount = (strtotime($actual_return_date) - strtotime($return_date)) / (60 * 60 * 24) * 1000; // Fine is 1000 Rupiah per day
        }

        // Update the transaction status and fine amount
        $update_sql = "UPDATE transactions SET actual_return_date = ?, fine_amount = ?, status = 'Returned' WHERE transaction_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param('sii', $actual_return_date, $fine_amount, $transaction_id);
        
        if ($update_stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Book returned successfully. Fine: ' . $fine_amount . ' Rupiah']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to return the book.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Transaction not found.']);
    }
}
?>