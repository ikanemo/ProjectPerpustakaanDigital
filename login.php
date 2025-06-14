
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Perpustakaan Digital</title>
  <link rel="icon" href="storage/img/logo.svg" type="image/x-icon" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

  <!-- MDB UI Kit (Opsional) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.0.0/mdb.min.css" rel="stylesheet" />
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    body {
      background-color: #f1f4f8;
      min-height: 100vh;
    }

    .card {
      border: none;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .img-side {
      height: 100%;
      object-fit: cover;
    }

    .login-logo {
      width: 140px;
    }

    .btn-login {
      background-color: #4a69bd;
      color: white;
    }

    .btn-login:hover {
      background-color: #2e59d9;
    }

    @media (max-width: 768px) {
      .img-side {
        display: none;
      }
    }
  </style>

</head>
<body>
    <?php
include 'layout/alert.php';
?>
  <section class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin-top: 1rem; margin-bottom: 1rem;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card">
            <div class="row g-0">
              
              <!-- Side Image -->
              <div class="col-md-6 d-none d-md-block">
                <img src="storage/img/Book.png" alt="Login Image" class="img-fluid img-side" />
              </div>

              <!-- Login Form -->
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body px-5 py-4">
                  <div class="text-center mb-4">
                    <img src="storage/img/logo.svg" alt="Logo" class="login-logo mb-3">
                    <h4 class="fw-bold mb-1">Perpustakaan Digital</h4>
                    <p class="text-muted">Silakan masuk ke akun Anda</p>
                  </div>

                  <form action="proses_login.php" method="POST">
                    <div class="mb-4">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" id="username" name="Username" class="form-control form-control-lg" required />
                    </div>

                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" id="password" name="Password" class="form-control form-control-lg" required />
                    </div>

                    <div class="d-grid">
                      <button type="submit" class="btn btn-login btn-lg">Login</button>
                    </div>
                  </form>

                  <hr class="my-4" />
                  <p class="text-center text-muted small">
                    Belum punya akun?
                    <a href="register.php" class="fw-bold text-decoration-none">Daftar di sini</a>
                  </p>
                </div>
              </div>
              <!-- End Form -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap & MDB JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/9.0.0/mdb.min.js"></script>
</body>
</html>
