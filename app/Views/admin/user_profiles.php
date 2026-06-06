<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<style>
.simple-table-wrap { background: #fff; border: 1px solid #ede9e3; border-radius: 20px; overflow: hidden; }
.simple-table { width: 100%; border-collapse: collapse; }
.simple-table th { text-align: left; padding: 13px 22px; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; color: #aaa; background: #f7f6f3; border-bottom: 1px solid #ede9e3; }
.simple-table td { padding: 14px 22px; border-bottom: 1px solid #f7f6f3; font-size: 0.9rem; color: #1a1a1a; }
.simple-table tr:last-child td { border-bottom: none;}
.simple-table tr:hover td { background: #faf9f7; }
</style>

<div class="adm-wrap">
    <div class="adm-topbar">
        <div>
            <h1>Profil Pengguna</h1>
            <p>Informasi profil lengkap dari setiap pengguna.</p>
        </div>
    </div>
    
    <div class="simple-table-wrap">
        <table class="simple-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Telepon</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profiles as $profile): ?>
                <tr>
                    <td><strong><?= esc($profile['nama_pengguna'] ?? $profile['user_name'] ?? '') ?></strong></td>
                    <td style="font-family:monospace;font-size:.88rem;"><?= esc($profile['nik']) ?></td>
                    <td><?= esc($profile['telepon']) ?></td>
                    <td><?= esc($profile['pekerjaan']) ?></td>
                    <td>Rp <?= number_format($profile['penghasilan'], 0, ',', '.') ?></td>
                    <td><span class="badge success">Lengkap</span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
