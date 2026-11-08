<?php
require __DIR__ . '/includes/functions.php';
// Membuka halaman login selalu meminta akun lagi: sesi admin lama dihapus
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !empty($_SESSION['admin'])) {
    unset($_SESSION['admin']);
    session_regenerate_id(true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';
    if ($u === '' || $p === '') {
        flash('error', 'Username dan password wajib diisi.');
    } else {
        $r = row("SELECT * FROM users WHERE username = ?", 's', [$u]);
        if ($r && password_verify($p, $r['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin'] = ['id' => $r['id'], 'nama' => $r['nama_lengkap']];
            redirect(url('admin/dashboard.php'));
        }
        flash('error', 'Username atau password salah.');
    }
}
$judul = 'Login Admin'; $bodyClass = '';
include __DIR__ . '/includes/head.php';
?>
<div class="auth"><div class="panel">
  <h1 class="h4 fw-bold" style="color:var(--navy)">Masuk sebagai Admin</h1>
  <p class="text-muted">Sistem Absensi Kegiatan Mahasiswa</p>
  <form method="post" class="needs-validation" novalidate>
    <div class="mb-3"><label class="form-label">Username</label>
      <input name="username" class="form-control" value="<?= e($_POST['username'] ?? '') ?>" required autofocus>
      <div class="invalid-feedback">Username wajib diisi.</div></div>
    <div class="mb-3"><label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
      <div class="invalid-feedback">Password wajib diisi.</div></div>
    <button class="btn btn-primary w-100">Masuk</button>
  </form>
  <a href="<?= url('index.php') ?>" class="d-block text-center mt-3 small">Kembali ke halaman publik</a>
</div></div>
<?php include __DIR__ . '/includes/foot.php';
