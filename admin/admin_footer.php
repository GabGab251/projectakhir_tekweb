<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Footer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  /* Basic Styles */
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  /* Site Footer */
  .site-footer {
    background-color: #333;
    color: white;
    padding: 30px 0;
    font-size: 0.9rem;
  }

  /* Footer Content */
  .footer-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
  }

  /* Footer Section: Logo and Name */
  .footer-logo {
    flex: 1;
  }

  .footer-logo span {
    font-size: 1.5rem;
    font-weight: 600;
  }

  /* Footer Section: Contact Us */
  .footer-contact {
    flex: 1;
  }

  .footer-contact h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #e74c3c;
  }

  .footer-contact p {
    font-size: 1rem;
    color: white;
    margin-bottom: 8px;
  }

  .social-links a {
    color: white;
    font-size: 1.5rem;
    margin-right: 15px;
    transition: color 0.3s;
  }

  .social-links a:hover {
    color: #e74c3c;
  }

  /* Footer Section: Library Hours and Location */
  .footer-hours,
  .footer-location {
    flex: 1;
  }

  .footer-hours p,
  .footer-location p {
    font-size: 1rem;
    color: white;
    margin-bottom: 10px;
  }

  /* Footer Bottom */
  .footer-bottom {
    background-color: #2c3e50;
    color: white;
    padding: 15px 0;
    text-align: center;
    margin-top: 30px;
    /* Added space between footer content and footer bottom */
  }

  .footer-bottom .copyright-text {
    font-size: 0.85rem;
  }

  /* Responsiveness */
  @media (max-width: 768px) {
    .footer-content {
      flex-direction: column;
      text-align: center;
    }

    .footer-logo,
    .footer-contact,
    .footer-hours,
    .footer-location {
      flex: 1 100%;
      margin-bottom: 20px;
    }
  }
  </style>
</head>

<body>
  <!-- Footer -->
  <footer class="site-footer">
    <div class="container footer-content">
      <!-- Left: Logo and Name -->
      <div class="footer-logo">
        <span>Surabaya Online Library</span>
      </div>

      <!-- Middle: Contact Us -->
      <div class="footer-contact">
        <h5>Contact Us</h5>
        <p>Email: info@surabayaonline.com</p>
        <div class="social-links">
          <a href="#" class="mr-3"><i class="fab fa-facebook-square"></i></a>
          <a href="#" class="mr-3"><i class="fab fa-twitter-square"></i></a>
          <a href="#" class="mr-3"><i class="fab fa-instagram"></i></a>
          <a href="#" class="mr-3"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>

      <!-- Right: Library Hours and Location -->
      <div class="footer-hours">
        <h5>Library Hours</h5>
        <p>Monday to Friday: 9:00 AM - 5:00 PM</p>
        <p>Saturday: 10:00 AM - 3:00 PM</p>
        <p>Sunday: Closed</p>
      </div>

      <div class="footer-location">
        <h5>Our Location</h5>
        <p>Jl. Raya No. 123, Surabaya, East Java, Indonesia</p>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <div class="container">
        <div class="copyright-text">
          Copyright 2024 &copy; Surabaya Online Library
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>