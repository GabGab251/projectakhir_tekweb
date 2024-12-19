<?php include ('navbar.php'); ?>

<!-- fine-payment.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fine Payment</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="fine-payment-container">
    <h2>Fine Payment</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Fine Amount</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>Rp 100,000</td>
          <td><button class="status-paid">Paid</button></td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>Rp 200,000</td>
          <td><button class="status-unpaid">Unpaid</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>