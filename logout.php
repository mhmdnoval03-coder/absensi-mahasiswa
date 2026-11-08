<?php
require __DIR__ . '/includes/functions.php';
$_SESSION = [];
session_destroy();
session_start();
flash('success', 'Anda berhasil keluar.');
redirect(url('login.php'));
