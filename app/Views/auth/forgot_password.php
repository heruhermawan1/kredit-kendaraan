<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .auth-page { min-height: calc(100vh - 62px); display: grid; grid-template-columns: 1fr 1fr; }
    .auth-visual { position: relative; overflow: hidden; background: #111; }
    .auth-visual img { width: 100%; height: 100%; object-fit: cover; opacity: .5; position: absolute; inset: 0; }
    .auth-visual-content { position: relative; z-index: 1; padding: 48px; height: 100%; display: flex; flex-direction: column; justify-content: flex-end; }
    .auth-visual-brand { display: flex; align-items: center; gap: 9px; color: #fff; font-weight: 800; font-size: 1.1rem; margin-bottom: auto; }
    .auth-visual-brand-mark { width: 34px; height: 34px; background: #c8410a; border-radius: 9px; display: grid; place-items: center; font-size: 0.85rem; font-weight: 800; }
    .auth-visual-quote { color: rgba(255,255,255,.9); }
    .auth-visual-quote h2 { font-size: 1.9rem; font-weight: 800; line-height: 1.2; margin: 0 0 14px; letter-spacing: -0.02em; }
    .auth-visual-quote p { color: rgba(255,255,255,.6); font-size: 0.92rem; line-height: 1.7; margin: 0; max-width: 360px; }
    .auth-form-side { background: #fff; display: flex; align-items: center; justify-content: center; padding: 48px 40px; }
    .auth-form-box { width: 100%; max-width: 380px; }
    .auth-form-box h1 { font-size: 1.7rem; font-weight: 800; letter-spacing: -0.025em; color: #1a1a1a; margin: 0 0 6px; }
    .auth-form-box .auth-sub { color: #888; font-size: 0.9rem; margin: 0 0 32px; line-height: 1.5; }
    .auth-field { margin-bottom: 18px; }
    .auth-field label { display: block; font-size: 0.85rem; font-weight: 600; color: #333; margin-bottom: 7px; }
    .auth-field input { width: 100%; padding: 11px 14px; border: 1.5px solid #e5e2dc; border-radius: 9px; font-size: 0.93rem; color: #1a1a1a; background: #faf9f7; transition: border-color .15s, box-shadow .15s; }
    .auth-field input:focus { outline: none; border-color: #c8410a; background: #fff; box-shadow: 0 0 0 3px rgba(200,65,10,.1); }
    .auth-field input::placeholder { color: #bbb; }
    .auth-submit { width: 100%; padding: 13px; background: #1a1a1a; color: #fff; border: none; border-radius: 9px; font-size: 0.95rem; font-weight: 700; cursor: pointer; margin-top: 6px; transition: background .18s, transform .18s; display: flex; align-items: center; justify-content: center; gap: 8px; }
    .auth-submit:hover { background: #c8410a; transform: translateY(-1px); }
    .auth-footer-text { text-align: center; font-size: 0.88rem; color: #888; margin-top: 20px; }
    .auth-footer-text a { color: #c8410a; font-weight: 600; text-decoration: none; }
    .auth-footer-text a:hover { text-decoration: underline; }
    .auth-alert { background: #fdf0ef; color: #c0392b; border: 1px solid #f5c6c2; border-radius: 8px; padding: 11px 14px; font-size: 0.88rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
@media (max-width: 900px) { .auth-page { grid-template-columns: 1fr; } .auth-visual { min-height: 260px; } .auth-visual-content { padding: 28px; } .auth-visual-quote h2 { font-size: 1.4rem; } .auth-trust { display: none; } .auth-form-side { padding: 36px 24px; } }
</style>

<div class="auth-page">
    <div class="auth-visual">
        <img src="https://tse2.mm.bing.net/th/id/OIP.TZAhxI8FH6ZUEMIBqIEmhAAAAA?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Kendaraan">
        <div class="auth-visual-content">
            <div class="auth-visual-brand">
                <span class="auth-visual-brand-mark">A</span>
                AutoKredit
            </div>
            <div class="auth-visual-quote">
                <h2>Lupa Password</h2>
                <p>Masukan alamat email Anda, dan kami akan mengirimkan tautan untuk mengatur ulang password akun anda.</p>
            </div>
        </div>
    </div>
    <div class="auth-from-side">
        <h1>Reset Password</h1>
        <p class="auth-sub>Masukan email akun Anda untuk menerima link reset password.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="auth-alert">
                <svg widht="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widht="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                <?= session()->getFlashdata('erroe') ?>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="auth-alert" style="background: #e7f8ef; color: #146a3d; border-color: #c4e3d5;">
                    <svg widht="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widht="2"><path d="M20 6L9 171-5-5"/></svg>
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>

                <form action="/forgot-password" method="post">
                    <?= csrf_field() ?>
                    <div class="auth-field form-control">
                        <label for="email">Alamat email</label>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required value="<?= old('email')?>">
                    </div>
                    <button type="submit" class="auth-submit">
                        Kirim tautan reset
                        <svg widht="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-widht="2.5"><path d="M5 12h14M12 517 7-7-7"></svg>
                    </button>
                </form>
                <div class="auth-footer-text">
                    Kembali ke <a href="/login">login</a>
                </div>
    </div>
</div>