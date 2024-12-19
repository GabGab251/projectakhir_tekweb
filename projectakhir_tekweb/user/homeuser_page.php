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
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/owl.theme.default.min.css" rel="stylesheet">
  <link href="css/tooplate-gotto-job.css" rel="stylesheet"> -->
  <link href="css/homepage.css" rel="stylesheet">
  <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>


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
            <a class="nav-link active" href="homepage.html">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="peminjaman.html">Your Borrowing</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="location.html">Location</a>
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
                  <button type="submit" class="form-control">
                    Find the book
                  </button>
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
              <li>Loading borrowed book details...</li>
            </ul>
          </div>

          <!-- Fine Status -->
          <div class="col-lg-6 col-md-6 col-12">
            <h3 class="mb-3">Fine Status</h3>
            <p>Check your pending fines and make payments to continue borrowing books.</p>
            <ul id="fine-status">
              <li>Loading fine details...</li>
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

            <a href="#" class="site-footer-link">
              www.splonline.ac.id
            </a>
          </p>

          <p class="mb-2">
            <i class="custom-icon bi-telephone me-1"></i>

            <a href="tel: 812-4120-5412" class="site-footer-link">
              (+62) 812-4120-5412
            </a>
          </p>

          <p>
            <i class="custom-icon bi-envelope me-1"></i>

            <a href="mailto:info@splonline.ac.id" class="site-footer-link">
              info@splonline.ac.id
            </a>
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

  <!--GATAU INI BENER GA-->
  <script>
  document.addEventListener("DOMContentLoaded", () => {
    // Fetch borrowed books and fine details for the user (replace with actual API endpoint)
    const userId = "USER_ID"; // Replace with dynamic user ID
    const apiEndpoint = `https://api.example.com/library/user/${userId}/borrowing`;

    fetch(apiEndpoint)
      .then(response => response.json())
      .then(data => {
        // Update return reminder section
        const reminderSection = document.querySelector(".reminder-section .col-lg-6:nth-child(1) ul");
        reminderSection.innerHTML = `
                <li><strong>Book Title:</strong> ${data.bookTitle}</li>
                <li><strong>Due Date:</strong> ${data.dueDate}</li>
            `;

        // Update fine status section
        const fineSection = document.querySelector(".reminder-section .col-lg-6:nth-child(2) ul");
        fineSection.innerHTML = `
                <li><strong>Outstanding Fine:</strong> $${data.outstandingFine}</li>
                <li><strong>Payment Options:</strong> <a href="${data.paymentLink}">Pay Now</a></li>
            `;
      })
      .catch(error => {
        console.error("Error fetching borrowing data:", error);
      });
  });
  </script>

</body>

</html>