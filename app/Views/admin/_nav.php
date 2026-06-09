<?php

$peran  = session()->get('user')['peran'] ?? '';
$active = $active ?? '';

$isMaster     = $peran === 'admin_master';
$isPembayaran = $peran === 'admin_pembayaran';
?>
<div class="adm-nav">
    <?php if ($isMaster): ?>
        <a href="/admin" <?= $active === 'dashboard' ? 'class="active"' : '' ?>>Dasbor</a>
        <a href="/admin/applications" <?= $active === 'applications' ? 'class="active"' : '' ?>>Pengajuan</a>
        <a href="/admin/users" <?= $active === 'users' ? 'class="active"' : '' ?>>Pengguna</a>
        <a href="/admin/vehicles" <?= $active === 'vehicles' ? 'class="active"' : '' ?>>Kendaraan</a>
    <?php endif; ?>
    <a href="/admin/payments" <?= $active === 'payments' ? 'class="active"' : '' ?>>Pembayaran</a>
    <?php if ($isMaster): ?>
        <a href="/admin/reports" <?= $active === 'reports' ? 'class="active"' : '' ?>>Laporan</a>
    <?php endif; ?>
</div>
