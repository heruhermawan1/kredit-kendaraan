<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<style>
    .page-heading { margin: 0 0 22px; }
    .page-heading h1 { font-size: 1.5rem; font-weight: 800; letter-spacing: -0.02em; color: #1a1a1a; margin: 0 0 4px; }
    .page-heading p { color: #888; font-size: 0.88rem; margin: 0; }
    .users-table-wrap { background: #fff; border: 1px solid #e5e2dc; border-radius: 16px; overflow: hidden; }
    .users-table { width: 100%; border-collapse: collapse; }
    .users-table th { text-align: left; padding: 12px 20px; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; color: #aaa; background: #f7f6f3; border-bottom: 1px solid #e5e2dc; }
    .users-table td { padding: 14px 20px; border-bottom: 1px solid #f7f6f3; font-size: 0.88rem; color: #1a1a1a; vertical-align: middle; }
    .users-table tr:last-child td { border-bottom: none; }
    .users-table tr:hover td { background: #faf9f7; }
    .user-avatar-inline { width: 34px; height: 34px; border-radius: 9px; background: #1a1a1a; color: #fff; display: inline-grid; place-items: center; font-size: 0.82rem; font-weight: 800; margin-right: 10px; vertical-align: middle; flex-shrink: 0; }
    .user-name-cell { display: flex; align-items: center; }
    .user-name-cell .user-info h4 { font-size: 0.9rem; font-weight: 700; color: #1a1a1a; margin: 0 0 2px; }
    .user-name-cell .user-info p { font-size: 0.78rem; color: #aaa; margin: 0; }
    .role-tag { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 0.72rem; font-weight: 700; background: #f7f6f3; color: #555; }
    .role-tag.admin_master { background: #1a1a1a; color: #fff; }
    .role-tag.admin_pembayaran { background: #fdf0eb; color: #c8410a; }
</style>

<div class="page-heading">
    <h1>Pengguna</h1>
    <p>Semua akun yang terdaftar di sistem.</p>
</div>

<div class="users-table-wrap">
    <table class="users-table">
        <thead>
            <tr>
                <th>Pengguna</th>
                <th>Peran</th>
                <th>Pengajuan</th>
                <th>Bergabung</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $userItem) : ?>
            <tr>
                <td>
                    <div class="user-name-cell">
                        <span class="user-avatar-inline"><?= strtoupper(substr($userItem['nama'], 0, 1)) ?></span>
                        <div class="user-info">
                            <h4><?= esc($userItem['nama']) ?></h4>
                            <p><?= esc($userItem['email']) ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="role-tag <?= $userItem['peran'] ?>">
                        <?= ['admin_master' => 'Admin Master', 'admin_pembayaran' => 'Admin Pembayaran', 'user' => 'Pengguna'][$userItem['peran']] ?? ucfirst($userItem['peran']) ?>
                    </span>
                </td>
                <td><?= (new \App\Models\ApplicationModel())->where('id_pengguna', $userItem['id'])->countAllResults() ?> pengajuan</td>
                <td><?= date('d M Y', strtotime($userItem['dibuat_pada'])) ?></td>
                <td>
                    <span class="badge <?= !empty($userItem['aktif']) ? 'success' : 'danger' ?>">
                        <?= !empty($userItem['aktif']) ? 'Aktif' : 'Nonaktif' ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
