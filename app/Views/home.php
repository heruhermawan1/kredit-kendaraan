<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
/* ── Hero ── */
.hero-wrap {
    background: #0b1220;
    color: #fff;
    overflow: hidden;
    position: relative;
}
.hero-wrap::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
    opacity: .25;
    filter: blur(1px);
}
.hero-inner {
    position: relative;
    z-index: 1;
    width: min(1160px, calc(100% - 40px));
    margin: 0 auto;
    padding: 100px 0 90px;
    display: grid;
    grid-template-columns: 1fr 420px;
    gap: 60px;
    align-items: center;
}
.hero-left {
    display: flex;
    flex-direction: column;
    gap: 24px;
}
.hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.18);
    color: rgba(255,255,255,.9);
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 0.84rem;
    font-weight: 600;
    margin-bottom: 18px;
    backdrop-filter: blur(8px);
}
.hero-tag span { width: 7px; height: 7px; border-radius: 50%; background: #fb923c; }
.hero-inner h1 {
    font-size: clamp(2.4rem, 4.5vw, 4.2rem);
    font-weight: 800;
    line-height: 1.02;
    letter-spacing: -0.035em;
    margin: 0 0 22px;
    color: #fff;
}
.hero-inner h1 em {
    font-style: normal;
    color: #fb923c;
}
.hero-desc {
    color: rgba(255,255,255,.78);
    font-size: 1rem;
    line-height: 1.75;
    margin: 0 0 34px;
    max-width: 520px;
}
.hero-actions {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
}
.hero-btn-main {
    background: #f97316;
    color: #fff;
    padding: 14px 30px;
    border-radius: 999px;
    font-weight: 700;
    font-size: 0.98rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background .18s, transform .18s;
    text-decoration: none;
}
.hero-btn-main:hover { background: #ea580c; transform: translateY(-1px); }
.hero-btn-sec {
    background: rgba(255,255,255,.12);
    color: #fff;
    padding: 14px 26px;
    border-radius: 999px;
    font-weight: 600;
    font-size: 0.98rem;
    border: 1px solid rgba(255,255,255,.22);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background .18s;
    text-decoration: none;
}
.hero-btn-sec:hover { background: rgba(255,255,255,.2); }
.hero-stats {
    display: flex;
    gap: 28px;
    margin-top: 44px;
    padding-top: 36px;
    border-top: 1px solid rgba(255,255,255,.18);
}
.hero-stat strong {
    display: block;
    font-size: 1.7rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.02em;
}
.hero-stat span {
    font-size: 0.84rem;
    color: rgba(255,255,255,.65);
    line-height: 1.5;
}
.hero-logos {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    color: rgba(255,255,255,.72);
    font-size: 0.9rem;
    margin-top: 16px;
}
.hero-logo-chip {
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.15);
    padding: 9px 14px;
    border-radius: 999px;
    font-weight: 600;
}
.hero-card-wrap {
    position: relative;
}
.hero-card {
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 30px;
    overflow: hidden;
    backdrop-filter: blur(16px);
    box-shadow: 0 30px 70px rgba(15,23,42,.22);
}
.hero-card img {
    width: 100%;
    display: block;
    aspect-ratio: 4/3;
    object-fit: cover;
    opacity: .95;
}
.hero-card-info {
    padding: 22px 24px 24px;
}
.hero-card-info h3 {
    margin: 0 0 6px;
    font-size: 1.2rem;
    color: #fff;
    font-weight: 800;
}
.hero-card-info p {
    margin: 0;
    color: rgba(255,255,255,.75);
    font-size: 0.95rem;
}
.hero-card-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: #fff;
    color: #0f172a;
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 0.82rem;
    font-weight: 700;
    box-shadow: 0 14px 32px rgba(15,23,42,.18);
}
.hero-wrap::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 20% 20%, rgba(251,146,60,.15), transparent 28%),
                radial-gradient(circle at 80% 70%, rgba(59,130,246,.12), transparent 24%);
    pointer-events: none;
}

/* ── Why section ── */
.why-section {
    padding: 72px 0;
    background: #f6f8ff;
}
.why-inner {
    width: min(1160px, calc(100% - 40px));
    margin: 0 auto;
}
.section-label {
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #1d4ed8;
    margin-bottom: 12px;
}
.section-title {
    font-size: clamp(1.7rem, 3vw, 2.4rem);
    font-weight: 800;
    letter-spacing: -0.025em;
    color: #0f172a;
    margin: 0 0 14px;
    line-height: 1.15;
}
.section-desc {
    color: #475569;
    font-size: 0.97rem;
    line-height: 1.75;
    max-width: 520px;
    margin: 0;
}
.why-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
    margin-top: 48px;
}
.why-item {
    padding: 28px 24px;
    border-radius: 22px;
    border: 1px solid rgba(59,130,246,.14);
    background: #fff;
    transition: box-shadow .25s, transform .25s;
}
.why-item:hover { box-shadow: 0 18px 40px rgba(15,23,42,.1); transform: translateY(-4px); }
.why-icon {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    background: linear-gradient(180deg, #eff6ff 0%, #dbeafe 100%);
    display: grid;
    place-items: center;
    margin-bottom: 18px;
    color: #1d4ed8;
    box-shadow: inset 0 0 0 1px rgba(59,130,246,.1);
}
.why-item h3 {
    margin: 0 0 10px;
    font-size: 1.05rem;
    font-weight: 700;
    color: #111827;
}
.why-item p {
    margin: 0;
    color: #475569;
    font-size: 0.92rem;
    line-height: 1.7;
}

/* ── Vehicles section ── */
.vehicles-section {
    padding: 72px 0;
    background: #fff;
}
.vehicles-inner {
    width: min(1160px, calc(100% - 40px));
    margin: 0 auto;
}
.section-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 36px;
    flex-wrap: wrap;
}
.section-head h2 {
    margin: 0;
    font-size: clamp(1.6rem, 3vw, 2rem);
    font-weight: 800;
    color: #111827;
}
.section-link {
    color: #1d4ed8;
    font-weight: 700;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: border-color .18s;
}
.section-link:hover { border-color: #1d4ed8; }
.veh-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
    gap: 22px;
}
.veh-card {
    background: #f8fafc;
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    transition: transform .28s, box-shadow .28s;
}
.veh-card:hover { transform: translateY(-6px); box-shadow: 0 20px 56px rgba(15,23,42,.12); }
.veh-card-img {
    position: relative;
    aspect-ratio: 16/10;
    overflow: hidden;
}
.veh-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .35s ease;
}
.veh-card:hover .veh-card-img img { transform: scale(1.05); }
.veh-type-tag {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255,255,255,.95);
    color: #111827;
    padding: 5px 12px;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 700;
    backdrop-filter: blur(6px);
}
.veh-card-body { padding: 20px 22px 22px; }
.veh-meta {
    display: flex;
    gap: 8px;
    margin-bottom: 12px;
    flex-wrap: wrap;
}
.veh-meta span {
    font-size: 0.78rem;
    color: #475569;
    background: #e2e8f0;
    padding: 5px 11px;
    border-radius: 999px;
}
.veh-card-body h3 {
    margin: 0 0 8px;
    font-size: 1.05rem;
    font-weight: 800;
    color: #0f172a;
}
.veh-price-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid #e2e8f0;
}
.veh-price strong {
    display: block;
    font-size: 1.05rem;
    font-weight: 800;
    color: #c2410b;
}
.veh-price span {
    font-size: 0.78rem;
    color: #64748b;
}
.veh-link {
    font-size: 0.85rem;
    font-weight: 700;
    color: #1d4ed8;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.veh-link:hover { text-decoration: underline; }

/* ── Steps section ── */
.steps-section {
    padding: 72px 0;
    background: #fff;
}
.steps-inner {
    width: min(1160px, calc(100% - 40px));
    margin: 0 auto;
}
.steps-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    margin-top: 48px;
    position: relative;
}
.steps-grid::before {
    content: '';
    position: absolute;
    top: 28px;
    left: 10%;
    right: 10%;
    height: 1px;
    background: #ede9e3;
    z-index: 0;
}
.step-item {
    text-align: center;
    padding: 0 16px;
    position: relative;
    z-index: 1;
}
.step-num {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #1a1a1a;
    color: #fff;
    display: grid;
    place-items: center;
    font-size: 1.1rem;
    font-weight: 800;
    margin: 0 auto 20px;
    border: 3px solid #fff;
    box-shadow: 0 0 0 1px #ede9e3;
}
.step-item:first-child .step-num { background: #c8410a; }
.step-item h4 {
    margin: 0 0 10px;
    font-size: 0.97rem;
    font-weight: 700;
    color: #1a1a1a;
}
.step-item p {
    margin: 0;
    color: #666;
    font-size: 0.85rem;
    line-height: 1.7;
}

/* ── CTA section ── */
.cta-section {
    padding: 84px 0;
    background: radial-gradient(circle at top left, rgba(251,146,60,.16), transparent 28%),
                linear-gradient(180deg, #111827 0%, #1e293b 100%);
    position: relative;
    overflow: hidden;
}
.cta-section::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    pointer-events: none;
}
.cta-inner {
    width: min(1160px, calc(100% - 40px));
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    flex-wrap: wrap;
    position: relative;
    z-index: 1;
}
.cta-text h2 {
    font-size: clamp(1.8rem, 3vw, 2.6rem);
    font-weight: 800;
    color: #fff;
    margin: 0 0 12px;
    letter-spacing: -0.025em;
}
.cta-text p {
    color: rgba(255,255,255,.75);
    margin: 0;
    font-size: 0.97rem;
    line-height: 1.75;
    max-width: 520px;
}
.cta-actions { display: flex; gap: 12px; flex-wrap: wrap; }

/* ── Responsive ── */
@media (max-width: 1024px) {
    .hero-inner { grid-template-columns: 1fr; padding: 70px 0 60px; }
    .hero-card-wrap { display: none; }
    .why-grid { grid-template-columns: repeat(2, 1fr); }
    .steps-grid { grid-template-columns: repeat(2, 1fr); gap: 28px; }
    .steps-grid::before { display: none; }
}
@media (max-width: 640px) {
    .hero-inner { padding: 56px 0 48px; }
    .hero-inner h1 { font-size: 2.1rem; }
    .hero-stats { flex-wrap: wrap; gap: 20px; }
    .why-grid { grid-template-columns: 1fr; }
    .steps-grid { grid-template-columns: 1fr; }
    .cta-inner { flex-direction: column; }
    .cta-actions { flex-direction: column; width: 100%; }
    .cta-actions a { text-align: center; justify-content: center; }
}
</style>

<!-- Hero -->
<section class="hero-wrap">
    <div class="hero-inner">
        <div class="hero-left">
            <div class="hero-tag">
                <span></span>
                Proses pengajuan 100% online
            </div>
            <h1>Kredit kendaraan<br>tanpa <em>ribet</em>,<br>langsung diproses</h1>
            <p class="hero-desc">Pilih mobil atau motor, isi formulir singkat, dan tim kami akan bantu dari awal sampai kendaraan ada di tangan Anda. Tidak perlu antre, tidak perlu datang ke kantor.</p>
            <div class="hero-actions">
                <a href="/register" class="hero-btn-main">
                    Mulai Pengajuan
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="/catalog" class="hero-btn-sec">Lihat Katalog</a>
            </div>
            <div class="hero-logos">
                <div class="hero-logo-chip">2.400+ pengajuan disetujui</div>
                <div class="hero-logo-chip">Layanan cepat 1×24 jam</div>
                <div class="hero-logo-chip">Tanpa biaya tersembunyi</div>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <strong>2.400+</strong>
                    <span>Pengajuan<br>disetujui</span>
                </div>
                <div class="hero-stat">
                    <strong>98%</strong>
                    <span>Kepuasan<br>nasabah</span>
                </div>
                <div class="hero-stat">
                    <strong>1×24 jam</strong>
                    <span>Waktu<br>persetujuan</span>
                </div>
            </div>
        </div>
        <div class="hero-card-wrap">
            <div class="hero-card">
                <span class="hero-card-badge">Terlaris bulan ini</span>
                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=800&q=80" alt="Toyota Avanza">
                <div class="hero-card-info">
                    <h3>Toyota Avanza 1.3 G</h3>
                    <p>Cicilan mulai Rp 2,8 juta/bulan · Tenor 48 bln</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why -->
<section class="why-section">
    <div class="why-inner">
        <p class="section-label">Kenapa AutoKredit</p>
        <h2 class="section-title">Proses yang jelas,<br>tanpa biaya tersembunyi</h2>
        <p class="section-desc">Kami tidak percaya pada proses yang berbelit. Setiap langkah transparan dan bisa Anda pantau sendiri dari dashboard.</p>
        <div class="why-grid">
            <div class="why-item">
                <div class="why-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3>Form singkat</h3>
                <p>Cukup KTP dan data penghasilan. Pendaftaran selesai dalam satu sesi, tidak lebih dari 10 menit.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3>Status real-time</h3>
                <p>Setiap perubahan status pengajuan langsung muncul di dashboard. Tidak perlu telepon untuk tanya kabar.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3>Tenor fleksibel</h3>
                <p>Pilih tenor 12 sampai 60 bulan. Simulasi cicilan bisa dicoba dulu sebelum mengajukan.</p>
            </div>
            <div class="why-item">
                <div class="why-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3>Tim support lokal</h3>
                <p>Ada tim yang bisa dihubungi lewat telepon atau chat. Bukan bot, tapi orang sungguhan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Vehicles -->
<?php if (!empty($vehicles)): ?>
<section class="vehicles-section">
    <div class="vehicles-inner">
        <div class="section-head">
            <div>
                <p class="section-label">Pilihan kendaraan</p>
                <h2 class="section-title" style="margin:0;">Unit tersedia sekarang</h2>
            </div>
            <a href="/catalog" style="font-size:.9rem;font-weight:600;color:#c8410a;display:flex;align-items:center;gap:5px;white-space:nowrap;">
                Lihat semua
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
        <div class="veh-grid">
            <?php foreach (array_slice($vehicles, 0, 6) as $vehicle): ?>
            <div class="veh-card">
                <div class="veh-card-img">
                    <img src="<?= esc($vehicle['url_gambar']) ?>" alt="<?= esc($vehicle['nama']) ?>">
                    <span class="veh-type-tag"><?= esc($vehicle['tipe']) ?></span>
                </div>
                <div class="veh-card-body">
                    <div class="veh-meta">
                        <span><?= esc($vehicle['merek']) ?></span>
                        <span><?= esc($vehicle['tahun']) ?></span>
                        <span><?= esc($vehicle['stok']) ?> unit</span>
                    </div>
                    <h3><?= esc($vehicle['nama']) ?></h3>
                    <div class="veh-price-row">
                        <div class="veh-price">
                            <strong>Rp <?= number_format($vehicle['harga'] / 12, 0, ',', '.') ?>/bln</strong>
                            <span>Tenor 12 bln · estimasi</span>
                        </div>
                        <a href="/catalog" class="veh-link">
                            Detail
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Steps -->
<section class="steps-section">
    <div class="steps-inner">
        <div style="text-align:center;max-width:560px;margin:0 auto;">
            <p class="section-label">Cara kerja</p>
            <h2 class="section-title">4 langkah dari daftar<br>sampai kendaraan di tangan</h2>
        </div>
        <div class="steps-grid">
            <div class="step-item">
                <div class="step-num">1</div>
                <h4>Buat akun</h4>
                <p>Daftar dengan email dan isi data diri. Tidak perlu dokumen dulu di tahap ini.</p>
            </div>
            <div class="step-item">
                <div class="step-num">2</div>
                <h4>Pilih kendaraan</h4>
                <p>Cari di katalog, coba simulasi cicilan, lalu ajukan kendaraan yang cocok.</p>
            </div>
            <div class="step-item">
                <div class="step-num">3</div>
                <h4>Unggah dokumen</h4>
                <p>Upload KTP, slip gaji, dan dokumen pendukung. Semua bisa dari HP.</p>
            </div>
            <div class="step-item">
                <div class="step-num">4</div>
                <h4>Terima kendaraan</h4>
                <p>Setelah disetujui, kendaraan dikirim ke alamat atau bisa diambil langsung.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-inner">
        <div class="cta-text">
            <h2>Siap mulai pengajuan?</h2>
            <p>Daftar sekarang dan ajukan kredit kendaraan pertama Anda. Proses cepat, tidak ribet, dan tim kami siap membantu.</p>
        </div>
        <div class="cta-actions">
            <a href="/register" class="hero-btn-main">Daftar Sekarang</a>
            <a href="/catalog" style="background:rgba(255,255,255,.1);color:#fff;padding:13px 24px;border-radius:999px;font-weight:600;font-size:.95rem;border:1px solid rgba(255,255,255,.25);display:inline-flex;align-items:center;gap:8px;text-decoration:none;transition:background .18s;">Lihat Katalog</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
