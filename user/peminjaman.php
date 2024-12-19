<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Peminjaman Buku</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/tooplate-gotto-job.css" rel="stylesheet">
  <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> -->
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f4f4f9;
  }

  .loan-details {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
  }

  .loan-details h2 {
    text-align: center;
    color: #333;
  }

  .loan-details .book {
    display: flex;
    align-items: center;
    margin-top: 15px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  .loan-details .book img {
    width: 60px;
    height: 90px;
    object-fit: cover;
    margin-right: 15px;
  }

  .loan-details .book-details {
    flex: 1;
  }

  .loan-details .book-details h4 {
    margin: 0 0 5px 0;
    color: #333;
  }

  .loan-details .book-details p {
    margin: 0;
    color: #555;
  }

  .overdue {
    color: #d9534f;
  }

  .fine {
    color: #d9534f;
    font-weight: bold;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <body id="top">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
          <img src="images/logo.png" class="img-fluid logo-image">
          <div class="d-flex flex-column">
            <strong class="logo-text">Surabaya</strong>
            <small class="logo-slogan">Online Library</small>
          </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav align-items-center ms-lg-5">
            <li class="nav-item">
              <a class="nav-link active" href="homeuser_page.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="peminjaman.php">Your Borrowing</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="location.php">Location</a>
            </li>
          </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarProfile">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 me-2"></i> <!-- User Icon -->
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                  <a class="dropdown-item" href="profile.html">
                    <i class="bi bi-person me-2"></i>Profile
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="logout.html">
                    <i class="bi bi-box-arrow-right me-2"></i>Log Out
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Loan Details Section -->
    <div class="loan-details">
      <h2>Detail Peminjaman Buku</h2>

      <div id="book-list">
        <!-- Buku 1 -->
        <div class="book">
          <img src="https://via.placeholder.com/60x90" alt="JavaScript: The Good Parts cover">
          <div class="book-details">
            <h4>JavaScript: The Good Parts</h4>
            <p>by Douglas Crockford</p>
            <p>Tanggal Peminjaman: <span>2024-12-01</span></p>
            <p>Tanggal Pengembalian: <span>2024-12-08</span></p>
          </div>
        </div>

        <!-- Buku 2 -->
        <div class="book">
          <img src="https://via.placeholder.com/60x90" alt="Clean Code cover">
          <div class="book-details">
            <h4>Clean Code</h4>
            <p>by Robert C. Martin</p>
            <p>Tanggal Peminjaman: <span>2024-12-05</span></p>
            <p>Tanggal Pengembalian: <span>2024-12-12</span></p>
          </div>
        </div>

        <!-- Buku 3 -->
        <div class="book">
          <img src="https://via.placeholder.com/60x90" alt="You Don't Know JS cover">
          <div class="book-details">
            <h4>You Don't Know JS</h4>
            <p>by Kyle Simpson</p>
            <p>Tanggal Peminjaman: <span>2024-12-12</span></p>
            <p>Tanggal Pengembalian: <span>2024-12-19</span></p>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
      const currentDate = new Date(); // Tanggal saat ini
      const finePerDay = 5000; // Denda per hari keterlambatan

      $(".book").each(function() {
        const returnDateText = $(this).find("span").eq(1).text();
        const returnDate = new Date(returnDateText);
        const bookDetails = $(this).find(".book-details");

        if (returnDate > currentDate) {
          bookDetails.append("<p>Belum dikembalikan</p>");
        } else if (currentDate > returnDate) {
          const overdueDays = Math.ceil((currentDate - returnDate) / (1000 * 60 * 60 * 24));
          const fine = overdueDays * finePerDay;

          bookDetails.append(
            `<p class='overdue'>Belum dikembalikan, terlambat: ${overdueDays} hari</p>` +
            `<p class='fine'>Denda: Rp${fine.toLocaleString()}</p>`
          );
        } else {
          bookDetails.append("<p>Sudah dikembalikan</p>");
        }
      });
    });
    </script>
  </body>

</html>