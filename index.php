<?php
require __DIR__ . '/includes/functions.php';
$list = rows("SELECT * FROM kegiatan ORDER BY tanggal DESC, jam_mulai DESC");
$judul = 'Daftar Kegiatan'; $bodyClass = '';
include __DIR__ . '/includes/head.php';
?>
<div class="hero"><div class="container" style="max-width:960px">
  <h1>Absensi Kegiatan Mahasiswa</h1>
  <p class="mb-3 opacity-75">Untuk absen, pindai QR Code yang ditampilkan panitia di lokasi kegiatan.</p>
  <a href="<?= url('mahasiswa/riwayat.php') ?>" class="btn btn-light me-2">Lihat riwayat absensi</a>
  <a href="<?= url('login.php') ?>" class="btn btn-outline-light">Login admin</a>
</div></div>
<div class="pub"><div class="panel">
  <h2 class="h5 fw-bold mb-3" style="color:var(--navy)">Kegiatan tersedia</h2>
  <?php if (!$list): ?><p class="text-muted mb-0">Belum ada kegiatan.</p><?php else: ?>
  <div class="table-responsive"><table class="table align-middle mb-0">
    <thead><tr><th>Kegiatan</th><th>Tanggal</th><th>Waktu</th><th>Lokasi</th><th>Status</th></tr></thead>
    <tbody>
    <?php foreach ($list as $k): ?>
      <tr><td class="fw-semibold"><?= e($k['nama_kegiatan']) ?></td><td><?= tgl($k['tanggal']) ?></td>
      <td><?= jam($k['jam_mulai']) ?>–<?= jam($k['jam_selesai']) ?></td><td><?= e($k['lokasi']) ?></td>
      <td><?= badge($k['status']) ?></td></tr>
    <?php endforeach; ?>
    </tbody></table></div>
  <?php endif; ?>
</div></div>
<?php include __DIR__ . '/includes/foot.php';
