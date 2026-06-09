<?= $this->extend('Layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .verify-page {
    min-height: calc(100vh - 62px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    }
    .verify-box {
        width: 100%;
        max-width: 440px;
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 30px 60px rgba(23, 41, 74, .0.09);
        padding: 36px 30px;
        animation: fadeInUp .6s ease both;
    }
    .verify-box h1 {
        margin: 0 0 10px;
        font-size: 1.9rem;
        letter-spacing: -0.03em;
        color: #1b1b1b;
    }
    .verify-box p {
        margin: 0 0 24px;
        color: #5a5f72;
        line-height: 1.7;
    }
    .verify-field {
        margin-bottom: 18px;
    }
    .verify-field label {
        display: block;
        margin-bottom: 8px;
        color: #3f4e65
        font-size: 0.9rem;
        font-weight: 600;
    }
    .verify-field input {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #d8dbe6;
        border-radius: 12px;
        background: #fbfbfb;
        transition: border-color .15s, box-shadow .15s;
    }
    .verify-field input:focus {
        outline: none;
        border-color: #c8410a;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(200, 65, 10, .0.09);
    }
    .verify-submit,
    .verify-resend {
        width: 100%;
        border: none;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        transition: transform .18s, background .18s;
    }
    .verify-submit {
        background: #c8410a;
        color: #fff;
        margin-top: 10px;
    }
    .verify-submit:hover {
    background: #a8360d;
    transform: translateY(-1px); 
    }
    .verify-resend {
        background: #f4f5f9;
        color: #4f597a;
    }
    ..verify-resend:hover {
        background: #e8ebf4;
        transform: translateY(-1px);
    }
    .verify-note {
       font-size: 0.88rem;
       color: #6c7284;
       margin-top: 14px;
    }
    .auth-alert,
    .auth-success {
       border-radius: 12px;
       padding:14px 16px;
       margin-bottom: 18px;
       font-size: 0.92rem;
    }
    .auth-alert { background: #fff0f0; color: #b93b3b; border: 1px solid #f5c6c2; }
    .auth-success { background: #effaf3; color: #276849; border: 1px solid #b7e4c7; }
    @keyframes floatIn {
        from {transform: translateY(20px); opacity: 0; }
        to {transform: translateY(0); opacity: 1; }
    }
    @media (max-widht: 640px) {
        .verify-box { padding:28px  20px; }
    }
    <section class="verify-page">
    <div class="verify-box">
    <h1>Verifikasi email anda</h1>
    <p>Masukkan alamat email anda dan kode verifikasi yang dikirim ke inbox Anda untuk mengaktifkan akun.</p>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="auth-alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="auth-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form action="/verify-email" method="post">
                <?= csrf_field() ?>
                <div class="verify-field form-control">
                    <label for="email">Alamat email</label>
                    <input type="email" id="email" name="email" required value="<?= old('email') ?>" placeholder="budi@email.com">
                </div>
                <div class="verify-field form-control">
                    <label for="code">Kode verifikasi</label>
                    <div style="display:flex; gap: 8px; align-items:center;">
                    <input type="text" id="code" name="code" maxlength:"6" required placeholder="12345" value="<?= old('code') ?>" style="flex:1;">
                    <button type="button" id="copy-code" class="btn btn-xs">Salin</button> 
        </div>
    </div>
    <button type="submit" class="verify-submit">Verifikasi Sekarang</button>
    </form>

    <form action="/verify-email/resend" method="post" style="margin-top: 12px;">
    <?= csrf_field() ?>
    <input type="hidden" name="email" value="<?= old('email') ?>">
    <button type="submit" class="verify-resend">Kirim ulang kode verifikasi</button>
    </form>
    <p class="verify-note">Jika Anda tidak menerima email, periksa folder spam atau coba kirim ulang kode verifikasi.</p>
    </div>
</section>
</style>

<?= $this->endSection() ?>