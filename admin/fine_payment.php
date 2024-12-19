<?php
include '../koneksi.php'; 

$sql = "
SELECT 
    CONCAT(user.first_name, ' ', user.last_name) AS user_name,
    books.title AS book_name,
     CASE 
            WHEN transactions.actual_return_date IS NULL AND CURDATE() > transactions.return_date THEN 
                DATEDIFF(CURDATE(), transactions.return_date) * 1000
            ELSE 
                transactions.fine_amount 
        END AS total_fine, 
    transactions.payment_status AS status
FROM 
    transactions
JOIN 
    user ON transactions.user_id = user.ID
JOIN 
    books ON transactions.book_id = books.id
WHERE 
    transactions.status = 'Overdue';
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Fines</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <h1 style ="margin:10px">List of Overdue Fines</h1>
    
    <?php if ($result->num_rows > 0): ?>
      <div style ="margin:10px">
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Book Name</th>
                    <th>Total Fine</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                        <td>Rp<?php echo number_format($row['total_fine'], 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No overdue fines found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
    </div>
</body>
</html>
