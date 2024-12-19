<?php
include 'koneksi.php';

// Redirect function
function redirect($url) {
    header("Location: $url");
    exit();
}

// Sanitize input function
function sanitize($data) {
    return trim(htmlspecialchars(stripslashes($data))); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    // Ambil hash password dari database berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password yang di-hash
        if (password_verify($password, $row['password'])) {
            // Password cocok, cek role dan redirect sesuai role
            if ($row['role'] === 'admin') {
                redirect("admin/homeadmin_page.php");
            } else {
                redirect("user/homeuser_page.php");
            }
        } else {
            echo "<script>alert('Email atau password salah.');</script>";
        }
    } else {
        echo "<script>alert('Email atau password salah.');</script>";
    }
    $stmt->close();

} 
if (isset($_POST['signup'])) {
    $username = sanitize($_POST['username']);
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $email = sanitize($_POST['email']);
    $password = $_POST['password']; // Simpan password apa adanya
    $no_telepon = sanitize($_POST['no_telepon']);

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar.');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO user (username, first_name, last_name, email, password, no_telepon, role) VALUES (?, ?, ?, ?, ?, ?, 'user')");
        // $stmt->bind_param("ssssss", $username, $first_name, $last_name, $email, $password, $no_telepon);
        $stmt->bind_param("ssssss", $username, $first_name, $last_name, $email, $hashed_password, $no_telepon);


        if ($stmt->execute()) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.');</script>";
        } else {
            echo "<script>alert('Pendaftaran gagal. Silakan coba lagi.');</script>";
        }
    }
    $stmt->close();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surabaya Online Library</title>
  <link rel="stylesheet" href="style_login.css">
</head>

<body onload="resetForm()">
  <div class="form-structor">
    <div class="signup">
      <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
      <form method="POST" action="" autocomplete="off">
        <div class="form-holder">
          <input type="text" name="username" class="input" placeholder="Username" required autocomplete="off" />
          <input type="text" name="first_name" class="input" placeholder="First Name" required />
          <input type="text" name="last_name" class="input" placeholder="Last Name" required />
          <input type="email" name="email" class="input" placeholder="Email" required />
          <input type="password" name="password" class="input" placeholder="Password" required
            autocomplete="new-password" />
          <input type="text" name="no_telepon" class="input" placeholder="No Telp" required />
        </div>
        <button type="submit" name="signup" class="submit-btn">Sign up</button>
      </form>
    </div>

    <div class="login slideup">
      <div class="center">
        <h2 class="form-title" id="login"><span>or</span>Log in</h2>
        <form method="POST" action="" autocomplete="off">
          <div class="form-holder">
            <input type="email" name="email" class="input" placeholder="Email" required autocomplete="off" />

            <input type="password" name="password" class="input" placeholder="Password" />
          </div>
          <button type="submit" name="login" class="submit-btn">Log in</button>
        </form>
      </div>
    </div>

  </div>
  <script>
  console.clear();
  if (window.history.replaceState) {
    // Mengganti state history agar POST tidak dikirim ulang saat refresh
    window.history.replaceState(null, null, window.location.href);
  }
  // Function to reset form and clear storage
  function resetForm() {
    // Reset semua form
    const forms = document.querySelectorAll('form');
    forms.forEach(form => form.reset());

    // Bersihkan localStorage/sessionStorage
    sessionStorage.clear();
    console.log('Form and storage have been reset.');
  }

  // Handle slide toggle between login and signup
  const loginBtn = document.getElementById('login');
  const signupBtn = document.getElementById('signup');

  loginBtn.addEventListener('click', (e) => {
    let parent = e.target.parentNode.parentNode;
    Array.from(e.target.parentNode.parentNode.classList).find((element) => {
      if (element !== "slide-up") {
        parent.classList.add('slide-up');
      } else {
        signupBtn.parentNode.classList.add('slide-up');
        parent.classList.remove('slide-up');
      }
    });
  });

  signupBtn.addEventListener('click', (e) => {
    let parent = e.target.parentNode;
    Array.from(e.target.parentNode.classList).find((element) => {
      if (element !== "slide-up") {
        parent.classList.add('slide-up');
      } else {
        loginBtn.parentNode.parentNode.classList.add('slide-up');
        parent.classList.remove('slide-up');
      }
    });
  });

  // Ensure forms are reset on page load
  document.addEventListener('DOMContentLoaded', () => {
    resetForm();
  });
  </script>
</body>

</html>