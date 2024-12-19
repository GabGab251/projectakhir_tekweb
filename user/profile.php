<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #1c1c1c; /* Gelap sesuai dengan tema homeuser_page.php */
            color: #fff; /* Teks putih agar kontras */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Memastikan body memenuhi tinggi layar */
            margin: 0;
        }

        .card {
            width: 350px;
            background-color: #333; /* Latar belakang gelap untuk kartu */
            border: none;
            border-radius: 12px; /* Sudut lebih bulat */
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 25px;
            min-height: 400px; /* Menambah tinggi minimum untuk kartu */
        }

        .btn {
            height: 40px;
            width: 120px;
            border-radius: 8px;
            border: none;
        }

        .name {
            font-size: 26px;
            font-weight: bold;
            color: #f4f4f4; /* Warna teks untuk nama */
            margin-bottom: 20px; /* Memberi jarak bawah */
        }

        .idd {
            font-size: 16px;
            font-weight: 600;
            color: #ccc; /* Warna lebih terang untuk username dan email */
            margin-bottom: 12px; /* Memberi jarak bawah */
        }

        .text span {
            font-size: 13px;
            color: #bbb; /* Warna teks untuk informasi */
            font-weight: 500;
        }

        .icons i {
            font-size: 19px;
        }

        .edit-overlay {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8); /* Gelap lebih pekat untuk overlay */
            z-index: 10;
            justify-content: center;
            align-items: center;
        }

        .edit-form {
            background: #222; /* Background lebih gelap untuk form edit */
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 25px;
            float: right;
            color: #f4f4f4;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff; /* Warna biru cerah untuk tombol simpan */
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Efek hover tombol simpan */
        }

        .btn-primary i {
            font-size: 20px; /* Ukuran ikon */
            color: #fff;
        }

        .btn-primary:focus {
            outline: none;
        }

        .image img {
            width: 100px; /* Menyesuaikan ukuran gambar agar lebih kecil */
            height: 100px; /* Menyesuaikan ukuran gambar agar lebih kecil */
            border-radius: 50%; /* Gambar berbentuk bulat */
            object-fit: cover; /* Memastikan gambar terpotong dengan baik */
            margin-bottom: 20px; /* Memberi ruang di bawah gambar */
        }
    </style>
</head>
<body>
    <div class="card p-4">
        <div class="image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary">
                <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
            </button>
            <span class="name mt-5" id="userName">[Enter Name]</span>
            <span class="idd mt-3" id="userUsername">[Enter Username]</span>
            <span class="idd mt-3" id="userEmail">[Enter Email]</span>
            <span class="idd mt-3" id="userPhone">[Enter Phone]</span>
            <div class="d-flex mt-3">
                <button class="btn btn-dark" id="editProfileBtn">Edit Profile</button>
            </div>
        </div>
    </div>

    <!-- Edit Form Overlay -->
    <div class="edit-overlay" id="editOverlay">
        <div class="edit-form">
            <button class="btn-close" id="closeOverlay">&times;</button>
            <h4 class="text-light">Edit Profile</h4>
            <div class="form-group">
                <label for="editName" class="text-light">Name:</label>
                <input type="text" id="editName" class="form-control" placeholder="Enter your name" />
            </div>
            <div class="form-group">
                <label for="editUsername" class="text-light">Username:</label>
                <input type="text" id="editUsername" class="form-control" placeholder="Enter your username" />
            </div>
            <div class="form-group">
                <label for="editEmail" class="text-light">Email:</label>
                <input type="email" id="editEmail" class="form-control" placeholder="Enter your email" />
            </div>
            <div class="form-group">
                <label for="editPhone" class="text-light">Phone:</label>
                <input type="text" id="editPhone" class="form-control" placeholder="Enter your phone" />
            </div>
            <!-- Tombol Save dengan ikon Font Awesome dan bentuk tombol biasa -->
            <button class="btn btn-primary w-100" id="saveProfile">
                <i class="fas fa-save"></i> Save <!-- Ikon disk -->
            </button>
        </div>
    </div>

    <script>
        // Get elements
        const editOverlay = document.getElementById("editOverlay");
        const editProfileBtn = document.getElementById("editProfileBtn");
        const closeOverlay = document.getElementById("closeOverlay");
        const saveProfile = document.getElementById("saveProfile");

        const userName = document.getElementById("userName");
        const userUsername = document.getElementById("userUsername");
        const userEmail = document.getElementById("userEmail");
        const userPhone = document.getElementById("userPhone");

        const editName = document.getElementById("editName");
        const editUsername = document.getElementById("editUsername");
        const editEmail = document.getElementById("editEmail");
        const editPhone = document.getElementById("editPhone");

        // Open edit overlay
        editProfileBtn.addEventListener("click", () => {
            editName.value = userName.textContent === "[Enter Name]" ? "" : userName.textContent;
            editUsername.value = userUsername.textContent === "[Enter Username]" ? "" : userUsername.textContent;
            editEmail.value = userEmail.textContent === "[Enter Email]" ? "" : userEmail.textContent;
            editPhone.value = userPhone.textContent === "[Enter Phone]" ? "" : userPhone.textContent;
            editOverlay.style.display = "flex";
        });

        // Close edit overlay
        closeOverlay.addEventListener("click", () => {
            editOverlay.style.display = "none";
        });

        // Save profile changes
        saveProfile.addEventListener("click", () => {
            userName.textContent = editName.value || "[Enter Name]";
            userUsername.textContent = editUsername.value || "[Enter Username]";
            userEmail.textContent = editEmail.value || "[Enter Email]";
            userPhone.textContent = editPhone.value || "[Enter Phone]";

            editOverlay.style.display = "none";
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
