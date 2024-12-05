<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari email
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if ($password === $row['password']) { // Ganti dengan password_verify jika menggunakan hashing
            echo "Login berhasil! Selamat datang, " . $row['username'];
            header("Location: index.php"); 
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}

if (isset($_POST['signup'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Cek apakah email sudah terdaftar
  $checkQuery = "SELECT * FROM user WHERE email = '$email'";
  $checkResult = mysqli_query($conn, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
      echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.');</script>";
  } else {
      // Tambahkan data ke database
      $insertQuery = "INSERT INTO user (username, email, password) VALUES ('$nama', '$email', '$password')";
      if (mysqli_query($conn, $insertQuery)) {
          echo "<script>alert('Pendaftaran berhasil! Silakan login.');</script>";
      } else {
          echo "<script>alert('Pendaftaran gagal. Silakan coba lagi.');</script>";
      }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surabaya Online Library</title>
  <link rel="stylesheet" href="css/style_login.css">

</head>

<body>
  <div class="form-structor">
    <div class="signup">
      <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
      <form method="POST" action="">
        <div class="form-holder">
          <input type="text" name="nama" class="input" placeholder="Name" required />
          <input type="email" name="email" class="input" placeholder="Email" required />
          <input type="password" name="password" class="input" placeholder="Password" required />
        </div>
        <button type="submit" name="signup" class="submit-btn">Sign up</button>
      </form>
    </div>
    <div class="login slide-up">
      <div class="center">
        <h2 class="form-title" id="login"><span>or</span>Log in</h2>
        <form method="POST" action="">
          <div class="form-holder">
            <input type="email" name="email" class="input" placeholder="Email" required />
            <input type="password" name="password" class="input" placeholder="Password" required />
          </div>
          <button type="submit" name="login" class="submit-btn">Log in</button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>
<script>
console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode.parentNode;
  Array.from(e.target.parentNode.parentNode.classList).find((element) => {
    if (element !== "slide-up") {
      parent.classList.add('slide-up')
    } else {
      signupBtn.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
});

signupBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode;
  Array.from(e.target.parentNode.classList).find((element) => {
    if (element !== "slide-up") {
      parent.classList.add('slide-up')
    } else {
      loginBtn.parentNode.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
});
</script>