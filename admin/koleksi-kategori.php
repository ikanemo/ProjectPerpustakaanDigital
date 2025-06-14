<?php

require 'config/session.php';
require '../koneksi.php';

// Ambil data kategori dan buku dari kategeri buku relasi, urut berdasarkan nama kategori
$result = mysqli_query(
    $koneksi,
    "SELECT Kategoribuku_relasi.*, buku.*, Kategoribuku.* 
    FROM Kategoribuku_relasi 
    JOIN buku ON Kategoribuku_relasi.BukuID = buku.BukuID
    JOIN Kategoribuku ON Kategoribuku_relasi.KategoriID = Kategoribuku.KategoriID
    ORDER BY Kategoribuku.Namakategori ASC"
) or die("Query gagal: " . mysqli_error($koneksi));

// Include layout (sidebar + navbar)
include '../layout/sidebar-navbar-footbar.php';
include '../layout/alert.php';
?>

<style>
  @media (min-width: 992px) {
    body { margin-left: 240px; }
  }

  .accordion-button:not(.collapsed) {
      background-color: #0d6efd;
      color: white;
    }
</style>

<div class="mx-5 mt-4">
  <!-- Judul -->
  <h1 class="mb-3">Koleksi Kategori Buku</h1>
  <!-- Tombol di bawah judul -->
  <a href="koleksi-kategori-add.php" class="btn btn-success mb-4">+ Tambah Data</a>

  <!-- Accordion dalam card -->
  <div class="card shadow-sm mb-4">
    <div class="card-body p-0">
      <div class="accordion" id="accordionKategoriBuku">
        <?php if (mysqli_num_rows($result) === 0): ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingNoData">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNoData" aria-expanded="true" aria-controls="collapseNoData">
                Belum ada kategori.
              </button>
            </h2>
            <div id="collapseNoData" class="accordion-collapse collapse show" aria-labelledby="headingNoData" data-bs-parent="#accordionKategoriBuku">
              <div class="accordion-body">
                Tidak ada kategori buku yang terdaftar.
              </div>
            </div>
          </div>
        <?php else: 
          // Menyimpan data kategori buku dan buku
          $kategoriData = [];
          while ($row = mysqli_fetch_assoc($result)) {
              $kategoriData[$row['KategoriID']]['kategori'] = $row['Namakategori'];
              $kategoriData[$row['KategoriID']]['buku'][] = $row['Judul'];
          }

          // Loop untuk menampilkan kategori dan buku
          foreach ($kategoriData as $kategoriID => $kategori): ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading<?= $kategoriID ?>">
                <button class="accordion-button collapsed" type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#collapse<?= $kategoriID ?>" 
                  aria-expanded="false" 
                  aria-controls="collapse<?= $kategoriID ?>">
                  <?= htmlspecialchars($kategori['kategori']) ?>
                </button>
              </h2>
              <div id="collapse<?= $kategoriID ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $kategoriID ?>" data-bs-parent="#accordionKategoriBuku">
                <div class="accordion-body">
                  <!-- Menampilkan daftar judul buku dalam kategori -->
                  <ul>
                    <?php foreach ($kategori['buku'] as $judul): ?>
                      <li><?= htmlspecialchars($judul) ?></li>
                    <?php endforeach; ?>
                  </ul>

                  <!-- Tombol aksi -->
                  <a href="koleksi-kategori-edit.php?id=<?= $kategoriID ?>" class="btn btn-info btn-sm me-1">Ubah</a>
                  <?php $buttonId = 'hapusbutton_' . $kategoriID; ?>
                  <button type="button" class="btn btn-danger btn-sm" id=<?=$buttonId?>>Hapus</button>
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                  <script>
                    document.getElementById('<?= $buttonId ?>').addEventListener('click', function() {
                      Swal.fire({
                        title: 'Hapus Kategori?',
                        text: "Kamu yakin ingin menghapus kategori ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = 'crud-delete-koleksi-kategori.php?id=<?= $kategoriID ?>';
                        }
                      });
                    });
                  </script>
                </div>
              </div>
            </div>
        <?php endforeach; endif; ?>
      </div>
    </div>
  </div>
</div>
<?php
include '../layout/admin-footer.php';
?>
</body>
</html>
