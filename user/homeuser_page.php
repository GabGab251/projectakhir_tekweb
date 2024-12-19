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
      <!-- Logo on the left side -->
      <img src="logo.png" alt="Logo" class="navbar-logo">
      <span class="logo-text">Surabaya</span>
      <span class="logo-text">Online Library</span>
    </div>
    <div class="navbar-links">
      <a href="homeuser_page.php">Home</a>
      <a href="peminjaman.php">Your Borrowing</a>
      <a href="location.php">Location</a>
    </div>
    <div class="navbar-profile">
      <img src="profile.jpg" alt="Profile">
    </div>
  </nav>


  <main>

    <section class="hero-section d-flex justify-content-center align-items-center">
      <div class="section-overlay"></div>

      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-12 mb-5 mb-lg-0">
            <div class="hero-section-text mt-5">
              <h6 class="text-white">Hi, Surabayans!</h6>
              <h1 class="hero-title text-white mt-4 mb-4">Welcome to <br>Surabaya Online Library</h1>
            </div>
          </div>

          <div class="col-lg-6 col-12">
            <form class="custom-form hero-form" action="#" method="get" role="form">
              <h3 class="text-white mb-3">Search</h3>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-fancy"></i></span>
                    <input type="text" name="book-author" id="book-author" class="form-control"
                      placeholder="Author's name">
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

    <section class="reminder-section py-5">
      <div class="container">
        <div class="row">
          <!-- Return Reminder -->
          <div class="col-lg-6 col-md-6 col-12 mb-4">
            <h3 class="mb-3">Return Reminder</h3>
            <p>Don't forget to return your borrowed books on time!</p>
            <ul id="return-reminder">
              <li><strong>Book Title:</strong> JavaScript: The Good Parts</li>
              <li><strong>Due Date:</strong> 2024-12-25</li>
            </ul>
          </div>

          <!-- Fine Status -->
          <div class="col-lg-6 col-md-6 col-12">
            <h3 class="mb-3">Fine Status</h3>
            <p>Check your pending fines and make payments to continue borrowing books.</p>
            <ul id="fine-status">
              <li><strong>Outstanding Fine:</strong> $2.50</li>
              <li><strong>Payment Options:</strong> <a href="#">Pay Now</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6 col-12 mb-3">
          <div class="d-flex align-items-center mb-4">
            <img src="images/logo.png" class="img-fluid logo-image">
            <div class="d-flex flex-column">
              <strong class="logo-text">Surabaya</strong>
              <small class="logo-slogan">Online Library</small>
            </div>
          </div>

          <p class="mb-2">
            <i class="custom-icon bi-globe me-1"></i>
            <a href="#" class="site-footer-link">www.splonline.ac.id</a>
          </p>

          <p class="mb-2">
            <i class="custom-icon bi-telephone me-1"></i>
            <a href="tel: 812-4120-5412" class="site-footer-link">(+62) 812-4120-5412</a>
          </p>

          <p>
            <i class="custom-icon bi-envelope me-1"></i>
            <a href="mailto:info@splonline.ac.id" class="site-footer-link">info@splonline.ac.id</a>
          </p>

        </div>

      </div>
    </div>

    <div class="site-footer-bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-12 d-flex align-items-center">
            <p class="copyright-text">Copyright © Surabaya Public Library 2024</p>
          </div>

          <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center"
            href="#top"></a>

        </div>
      </div>
    </div>
  </footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/counter.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>