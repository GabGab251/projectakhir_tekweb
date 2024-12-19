<?php


include ('../koneksi.php');

$searchResults = [];
$searchMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "GET" && (isset($_GET['book-author']) || isset($_GET['book-title']))) {
  $author = isset($_GET['book-author']) ? trim($_GET['book-author']) : '';
  $title = isset($_GET['book-title']) ? trim($_GET['book-title']) : '';

  // SQL Query
  $query = "SELECT * FROM books WHERE 1=1";
  if (!empty($author)) {
    $query .= " AND author LIKE '%" . $conn->real_escape_string($author) . "%'";
  }
  if (!empty($title)) {
    $query .= " AND title LIKE '%" . $conn->real_escape_string($title) . "%'";
  }

  // Execute query
  $result = $conn->query($query);

  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $searchResults[] = $row;
    }
  } else {
    $searchMessage = "No books found matching your criteria.";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>Surabaya Online Library</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="css/homeuser_page.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body id="top">
  <!-- Navbar -->
  <nav class="custom-navbar">
    <div class="navbar-brand">
      <i class="fas fa-book navbar-logo" style="font-size: 36px; color: white;"></i>
      <span class="logo-text">Surabaya Online Library</span>
    </div>

    <div class="navbar-links">
      <a href="homeuser_page.php">Home</a>
      <a href="peminjaman.php">Your Borrowing</a>
      <a href="location.php">Location</a>
    </div>

    <div class="navbar-profile">
      <div class="dropdown">
        <i class="fas fa-user-circle navbar-profile-icon" style="font-size: 60px;" id="profileIcon"></i>
        <div class="dropdown-content" id="profileMenu">
          <a href="profile.php">Profile</a>
          <a href="user_logout.php" id="logoutLink">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <section class="hero-section d-flex justify-content-center align-items-center">
      <div class="section-overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-12 mb-5 mb-lg-0">
            <div class="hero-section-text">
              <div class="hero-title-container">
                <i class="fas fa-city surabaya-logo"></i>
                <h1 class="hero-title">Welcome to Surabaya Online Library</h1>
              </div>
              <h5 class="hero-description">Access the best books and resources for your learning journey.</h5>
            </div>
          </div>

          <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
            <form class="custom-form hero-form" action="" method="get" role="form">
              <h3 class="text-white mb-3">Search</h3>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-fancy"></i></span>
                    <input type="text" name="book-author" id="book-author" class="form-control" placeholder="Author's name">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-book"></i></span>
                    <input type="text" name="book-title" id="book-title" class="form-control" placeholder="Title">
                  </div>
                </div>

                <div class="col-lg-12 col-12">
                  <button type="submit" class="form-control">Find the book</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>

    <section class="search-results-section py-5">
      <div class="container">
        <h3>Search Results:</h3>
        <?php if (!empty($searchResults)): ?>
          <ul>
            <?php foreach ($searchResults as $book): ?>
              <li>
                <strong>Title:</strong> <?php echo htmlspecialchars($book['title']); ?> <br>
                <strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?> <br>
                <strong>Category:</strong> <?php echo htmlspecialchars($book['category']); ?> <br>
                <strong>Status:</strong> <?php echo htmlspecialchars($book['status']); ?> <br>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php elseif (!empty($searchMessage)): ?>
          <p><?php echo $searchMessage; ?></p>
        <?php endif; ?>
      </div>
    </section>

    <section class="reminder-section py-5">
      <div class="container">
        <div class="row">
          <!-- Kiri: Konten Reminder -->
          <div class="col-lg-6 col-md-6 col-12 mb-4">
            <h3 class="mb-3">Return Reminder</h3>
            <p>Don't forget to return your borrowed books on time!</p>
            <ul>
              <li><strong>Check your borrowing status</strong> - See when you need to return your book.</li>
              <li><strong>Stay updated</strong> - Make sure your borrowings are not overdue.</li>
            </ul>
          </div>
          <!-- Kanan: Gambar atau Konten Tambahan -->
          <div class="col-lg-6 col-md-6 col-12 mb-4">
            <img src="your-image-path.jpg" alt="Library Reminder" class="img-fluid">
          </div>
        </div>
      </div>
      </section>


  </main>

  <footer>
    <div class="site-footer">
      <div class="container">
        <div class="row">
          <!-- Left Section: Surabaya Online Library and Contact Us -->
          <div class="col-lg-6 col-md-6 col-12 mb-4">
            <span class="logo-text">Surabaya Online Library</span>
            <div class="contact-us">
              <h5>Contact Us</h5>
              <p>Email: info@surabayaonline.com</p>
              <div class="social-links">
                <a href="#" class="mr-3"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="mr-3"><i class="fab fa-twitter-square"></i></a>
                <a href="#" class="mr-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="mr-3"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <!-- Right Section: Library Hours and Our Location -->
          <div class="col-lg-6 col-md-6 col-12 mb-4 text-md-right">
            <div class="library-info">
              <h5>Library Hours</h5>
              <p>Monday to Friday: 9:00 AM - 5:00 PM</p>
              <p>Saturday: 10:00 AM - 3:00 PM</p>
              <p>Sunday: Closed</p>
            </div>
            <div class="location-info">
              <h5>Our Location</h5>
              <p>Jl. Raya No. 123, Surabaya, East Java, Indonesia</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom Text -->
    <div class="site-footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="copyright-text">
              Copyright 2024 &copy; Surabaya Online Library
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to top icon -->
  <div class="back-top-icon" id="back-to-top">
    <i class="fas fa-arrow-up"></i>
  </div>

  <script>
    // Scroll to top functionality
    const backToTopButton = document.getElementById('back-to-top');
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    // Dropdown Toggle
    document.querySelector(".navbar-profile-icon").addEventListener("click", function() {
      document.getElementById("profileMenu").classList.toggle("show");
    });

    // Close the dropdown if clicked outside
    window.onclick = function(event) {
      if (!event.target.matches('.navbar-profile-icon')) {
        var dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach(function(dropdown) {
          if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
          }
        });
      }
    };
  </script>
</body>

</html>
