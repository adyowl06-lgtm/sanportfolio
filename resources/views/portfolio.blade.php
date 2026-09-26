<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Satria Adi Nugroho</title>
    <!-- Font Google Stylized & Professional Earth Tone -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;800&family=Playfair+Display:ital,wght@1,600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        /* TAMBAHAN KODE ANIMASI TOOLTIP NAMA SOFTWARE */
        .software-icon-box {
    position: relative;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(74, 222, 255, 0.2);
    border-radius: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    cursor: pointer;

        }
        /* Kotak Teks Nama Software */
        .software-icon-box::after {
            content: attr(data-title); /* Mengambil teks nama dari atribut data-title */
            position: absolute;
            bottom: 115%; /* Posisi kotak berada sedikit di atas logo */
            left: 50%;
            transform: translateX(-50%) translateY(5px);
            background-color: #1c3d27; /* Warna hijau bumi/earth tone matching */
            color: #f4f0ea; /* Warna teks krem */
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(163, 177, 138, 0.4);

            /* Sifat animasi cepat (0.15s) */
            opacity: 0;
            visibility: hidden;
            transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: 100;
        }
        /* Segitiga Panah Kecil di Bawah Kotak Tooltip */
        .software-icon-box::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(5px);
            border-width: 5px;
            border-style: solid;
            border-color: #1c3d27 transparent transparent transparent;
            
            opacity: 0;
            visibility: hidden;
            transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: 100;
        }
        
        /* RESPON HOVER CEPAT: MUNCULKAN KOTAK & SEGITIGA PANAH */
        .software-icon-box:hover::after,
        .software-icon-box:hover::before {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }
        /* PERPINDAHAN HALAMAN SMOOTH */
        html {
            scroll-behavior: smooth;
        }

        /* BASE BODY: WARM CREAM / BEIGE PAPERY BACKGROUND */
        body {
            background-color: #f4f0ea;
            color: #2c2523;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* TEKSTUR KERTAS PADA BACKGROUND */
        .paper-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -2;
            pointer-events: none;
            opacity: 0.35;
            background-image: radial-gradient(#a39382 0.75px, transparent 0.75px), radial-gradient(#a39382 0.75px, #f4f0ea 0.75px);
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }

        /* CANVAS UNTUK GELEMBUNG MEMANTUL + EFEK PERGESERAN TEKSTUR */
        #bubble-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none;
        }

        /* NAVBAR STICKY TERPISAH (KIRI DAN KANAN) */
        .navbar-container {
            position: fixed;
            top: 25px;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* MENU NAVIGASI KIRI: WANT COLLABORATION (HIJAU BUMI GELAP) */
        .navbar-collab-left {
            background: #1c3d27;
            border: 1.5px solid #2d5a3c;
            border-radius: 30px;
            padding: 10px 24px;
            box-shadow: 0 4px 15px rgba(28, 61, 39, 0.25);
            transition: all 0.3s ease;
        }

        .navbar-collab-left a {
            color: #f4f0ea;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none !important;
        }

        .navbar-collab-left:hover {
            background: #2d5a3c;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(28, 61, 39, 0.35);
        }

        /* MENU NAVIGASI KANAN (KREM SOFT & COKELAT BUMI) */
        .navbar-capsule-right {
            display: inline-flex;
            gap: 25px;
            background: rgba(232, 224, 213, 0.85);
            border: 1.5px solid rgba(163, 147, 130, 0.4);
            border-radius: 30px;
            padding: 10px 30px;
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(60, 50, 45, 0.08);
        }

        .navbar-capsule-right a {
            color: #4a3e3d;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-capsule-right a:hover {
            color: #1c3d27;
            text-shadow: 0 0 5px rgba(28, 61, 39, 0.2);
        }

        /* HERO / HOME SECTION */
        .hero-section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-top: 60px;
        }

        .hero-title {
            font-family: 'Cinzel', serif;
            font-size: 4.5rem;
            font-weight: 800;
            letter-spacing: 10px;
            color: #2c2523;
            text-shadow: 0 2px 10px rgba(163, 147, 130, 0.3);
            margin-bottom: 5px;
        }

        .hero-subtitle {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.6rem;
            letter-spacing: 4px;
            color: #5c4d4a;
        }

        /* SECTION COMMON & MARGIN SPACING */
        .content-section {
            padding-top: 100px;
            padding-bottom: 80px;
            scroll-margin-top: 80px;
        }

        /* BASE GLASS CARD (KREM TERAKOTA SOFT) */
        .glass-card-base {
            border-radius: 20px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 45px;
            box-shadow: 0 8px 30px rgba(60, 50, 45, 0.06);
        }

        /* KOTAK 1: SOFTWARE (KREM TEKSTUR BERSIH) */
        .card-software {
            background: rgba(238, 231, 221, 0.75);
            border: 1.5px solid rgba(180, 165, 148, 0.5);
            padding: 35px 30px;
        }

        .software-flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .software-icon-box {
            width: 60px;
            height: 60px;
            background: rgba(244, 240, 234, 0.9);
            border: 1px solid rgba(163, 147, 130, 0.4);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }

        .software-icon-box:hover {
    background: rgba(74, 222, 255, 0.15);
    border-color: #4adeff;
    transform: translateY(-4px);
    box-shadow: 0 0 15px rgba(74, 222, 255, 0.4);
}

        .software-icon-box img {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }

        /* KOTAK 2: BIOGRAFI (WARM EARTH BEIGE) */
        .card-biography {
            background: rgba(232, 224, 213, 0.8);
            border: 1.5px solid rgba(163, 147, 130, 0.5);
        }

        .profile-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 20px;
            border: 3px solid #1c3d27;
            box-shadow: 0 6px 20px rgba(28, 61, 39, 0.2);
        }

        .blob-profile {
    width: 180px;
    height: 180px;
    object-fit: cover;
    background: #1c3d27;
    border: 3px solid #1c3d27;
    /* Animasi Perubahan Bentuk Blob */
    border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
    animation: morphBlob 8s ease-in-out infinite;
    transition: all 0.5s ease;
    box-shadow: 0 10px 25px rgba(28, 61, 39, 0.2);
}

.blob-profile:hover {
    border-radius: 20px; /* Kembali jadi kotak tumpul saat di-hover */
    transform: scale(1.05);
}

@keyframes morphBlob {
    0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
    50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
    100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
}

        /* EFEK TEKS MELAYANG / TERANGKAT SAAT HOVER */
.bio-text {
    color: #f2e9db;
    font-size: 0.95rem;
    line-height: 1.8;
    transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), color 0.3s ease;
    display: block; /* Memastikan transform berfungsi dengan sempurna */
    cursor: default;
}

/* KETIKA KURSOR DIARAHKAN KE TEKS BIOGRAFI */
.bio-text:hover {
    transform: translateY(-5px); /* Teks terangkat 5px ke atas */
    color: #082703; /* Mengubah warna teks menjadi lebih terang */
    text-shadow: 0 5px 15px rgba(96, 165, 250, 0.4); /* Memberikan efek pendaran cahaya biru halus */
}

/* BISA JUGA DITERAPKAN PADA ITEM DATA INFORMASI DI BAWAHNYA */
.bio-info-item {
    transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    display: inline-block;
}

.bio-info-item:hover {
    transform: translateY(-4px); /* Terangkat 4px ke atas */
}

        /* KOTAK 3: EXPERIENCE (KOTAK MENCOLOK HIJAU BUMI GELAP) */
        .card-experience {
            background: #1c3d27;
            border: 1.5px solid #2d5a3c;
            color: #f4f0ea;
            box-shadow: 0 10px 30px rgba(28, 61, 39, 0.25);
        }

        .project-box {
            display: block;
            background: rgba(244, 240, 234, 0.08);
            border: 1px solid rgba(244, 240, 234, 0.2);
            border-radius: 12px;
            padding: 22px;
            color: #f4f0ea !important;
            text-decoration: none !important;
            transition: all 0.3s ease;
        }

        .project-box:hover {
            border-color: #a3b18a;
            background: rgba(244, 240, 234, 0.15);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* AJAKAN KOLABORASI */
        .collab-section {
            padding-top: 100px;
            padding-bottom: 120px;
            text-align: center;
        }

        .collab-btn-box {
            display: inline-block;
            background: #1c3d27;
            border: 1.5px solid #2d5a3c;
            border-radius: 12px;
            padding: 14px 35px;
            color: #f4f0ea !important;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 6px 20px rgba(28, 61, 39, 0.25);
            transition: all 0.3s ease;
        }

        .collab-btn-box:hover {
            background: #2d5a3c;
            color: #ffffff !important;
            box-shadow: 0 8px 25px rgba(28, 61, 39, 0.35);
            transform: translateY(-3px);
        }

        .section-title {
            letter-spacing: 3px;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .skill-tooltip {
    position: absolute;
    top: 70px; /* Muncul tepat di bawah kotak logo */
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: rgba(6, 12, 30, 0.95);
    border: 1px solid rgba(16, 185, 129, 0.5); /* Border hijau neon */
    border-radius: 10px;
    padding: 10px 14px;
    width: 140px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6), 0 0 12px rgba(16, 185, 129, 0.2);
    backdrop-filter: blur(8px);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    z-index: 100;
}
/* PANAH KECIL DI ATAS TOOLTIP */
.skill-tooltip::before {
    content: "";
    position: absolute;
    top: -6px;
    left: 50%;
    transform: translateX(-50%);
    border-width: 0 6px 6px 6px;
    border-style: solid;
    border-color: transparent transparent rgba(16, 185, 129, 0.8) transparent;
}

/* ANIMASI MUNCUL SAAT KURSOR DIARAHKAN (HOVER) */
.software-icon-box:hover .skill-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

/* ISI HEADER TOOLTIP (NAMA SOFTWARE & PERSENTASE) */
.skill-tooltip-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.75rem;
    font-weight: 600;
    margin-bottom: 6px;
}

.skill-name {
    color: #e2e8f0;
}

.skill-percent {
    color: #10b981; /* Warna hijau neon */
    font-family: monospace;
}

/* CONTAINER BAR BATERAI / PROGRESS BAR */
.battery-bar-container {
    width: 100%;
    height: 8px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    overflow: hidden;
    padding: 1.5px;
    border: 1px solid rgba(16, 185, 129, 0.3);
}

/* ISIAN BAR BATERAI (HIJAU NEON) */
.battery-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #059669, #10b981);
    border-radius: 2px;
    box-shadow: 0 0 8px #10b981;
    transition: width 0.6s ease-in-out;
}
/* =========================================================
   FIX RESPONSIVE KHUSUS LAYAR HP (MAX-WIDTH: 768PX)
   ========================================================= */
@media (max-width: 768px) {
    
    /* 1. MENGATASI JUDUL "PORTFOLIO" AGAR TIDAK TERPOTONG */
    .hero-title {
        font-size: 2.2rem !important; /* Memperkecil ukuran teks di HP */
        letter-spacing: 3px !important; /* Mengurangi jarak antar huruf */
        word-wrap: break-word;
    }

    .hero-subtitle {
        font-size: 1.1rem !important;
        letter-spacing: 2px !important;
    }

    /* 2. MERAPIKAN NAVBAR DI HP */
    .navbar-capsule {
        padding: 6px 16px !important;
        gap: 10px !important;
        max-width: 95%;
    }

    .navbar-capsule a {
        font-size: 0.7rem !important;
        letter-spacing: 1px !important;
    }

    /* 3. MERAPIKAN GRID KARTU FOTO / PRESET AESTHETIC */
    /* Ubah grid foto agar tidak dipaksa bertumpuk banyak dalam 1 baris */
    .photo-grid-container, 
    .gallery-row {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important; /* Maksimal 2 kolom di HP */
        gap: 12px !important;
        padding: 10px !important;
    }

    /* 4. PERBAIKAN ITEM FOTO (BENTUK KAPSUL/TUMPUL DAN PROPORSI) */
    .photo-capsule-item,
    .gallery-card-item {
        width: 100% !important;
        height: 220px !important; /* Batasi tinggi yang pas untuk HP */
        border-radius: 25px !important;
        overflow: hidden !important;
        background-color: transparent !important;
    }

    .photo-capsule-item img,
    .gallery-card-item img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important; /* PENTING: Menghilangkan garis/ruang putih di atas-bawah gambar */
        border-radius: 25px !important;
    }

    /* 5. MEMBERI RUANG PADDING PADA KOTAK UTAMA */
    .glass-card-base,
    .card-software,
    .card-biography {
        padding: 20px 15px !important; /* Mengurangi padding dalam agar muat di HP */
    }
}
    </style>
</head>
<body>

    <!-- OVERLAY TEKSTUR KERTAS BACKGROUND -->
    <div class="paper-overlay"></div>

    <!-- CANVAS UNTUK GELEMBUNG MEMANTUL + EFEK PENGGESER TEKSTUR -->
    <canvas id="bubble-canvas"></canvas>

    <!-- NAVBAR STICKY TERPISAH (KIRI DAN KANAN) -->
    <div class="navbar-container">
        <div class="navbar-collab-left">
            <a href="#collab">Let’s Collaborate</a>
        </div>

        <div class="navbar-capsule-right">
            <a href="#home">Home</a>
            <a href="#skills">Expertise</a>
            <a href="#biography">Profile</a>
            <a href="#experience">Experience</a>
        </div>
    </div>

    <div class="container">
        
        <!-- HALAMAN UTAMA (HERO SECTION) -->
        <section class="hero-section" id="home">
            <h1 class="hero-title">PORTFOLIO</h1>
            <div class="hero-subtitle">SATRIA ADI NUGROHO</div>
        </section>

        <!-- KOTAK 1: SOFTWARE YANG DIKUASAI -->
        <!-- KOTAK 1: SOFTWARE YANG DIKUASAI (DENGAN ANIMASI TOOLTIP BATERAI/SKILL) -->
<section class="content-section" id="skills">
    <div class="glass-card-base card-software">
        <h4 class="text-center section-title" style="color: #011a09;">SOFTWARE & KEAHLIAN</h4>
        
        <div class="software-flex-container">
            @foreach($softwares as $software)
                <!-- PENTING: Hapus atribut title="..." agar tooltip bawaan browser tidak mengganggu -->
                <div class="software-icon-box">
                    <img src="{{ asset($software['icon']) }}" alt="{{ $software['name'] }}">
                    
                    <!-- TOOLTIP POPUP DENGAN TAMPILAN INDIKATOR BATERAI -->
                    <div class="skill-tooltip">
                        <div class="skill-tooltip-header">
                            <span class="skill-name">{{ $software['name'] }}</span>
                            <span class="skill-percent">{{ $software['level'] ?? 80 }}%</span>
                        </div>
                        <div class="battery-bar-container">
                            <div class="battery-bar-fill" style="width: {{ $software['level'] ?? 80 }}%;"></div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

        <!-- KOTAK 2: BIOGRAFI PEMILIK -->
        <section class="content-section" id="biography">
            <div class="glass-card-base card-biography">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <img src="{{ asset('images/profil.png') }}" alt="Satria Adi Nugroho" class="blob-profile">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-weight-bold mb-3" style="color: #1c3d27; letter-spacing: 1px;">About Me</h4>
                        <p class="bio-text mb-4">
                            Hello! I’m <strong>Satria Adi Nugroho</strong>, a Graphic Designer and Freelance Designer focused on creating logos, visual identities, and illustrations. I have a strong interest in the creative field and continue to develop my skills in Web Development as part of my learning and exploration of digital technology. I enjoy turning ideas into visual works that are simple, meaningful, and distinctive. I’m also open to learning new things, exploring creative opportunities, and developing my skills through various projects.
                        <div class="row text-center text-md-left">
                            <div class="col-6 col-sm-4 mb-2">
                                <span class="d-block text-muted small">Main Focus</span>
                                <strong style="color: #2c2523;">Graphic Design / Logo & Illustration</strong>
                            </div>
                            <div class="col-6 col-sm-4 mb-2">
                                <span class="d-block text-muted small">Currently Learning</span>
                                <strong style="color: #2c2523;">Web Development</strong>
                            </div>
                            <div class="col-12 col-sm-4 mb-2">
                                <span class="d-block text-muted small">Status</span>
                                <strong style="color: #1c3d27;">Freelance / Open for Collaboration</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- KOTAK 3: EXPERIENCE / PROYEK (HIJAU BUMI GELAP MENCOLOK) -->
        <!-- KOTAK 3: EXPERIENCE / PROYEK -->
<section class="content-section" id="experience">
    <div class="glass-card-base card-experience">
        <h4 class="text-center section-title" style="color: #f4f0ea;">PROJECT EXPERIENCE</h4>
        <div class="row justify-content-center">
    @foreach($projects as $project)
        <div class="col-md-6 mb-4">
            <a href="{{ route($project['route_name']) }}" class="project-box">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="font-weight-bold m-0" style="color: #f0fdfa;">{{ $project['title'] }}</h6>
                    <span class="badge" style="background-color: #0d9488; color: #fff;">{{ $project['category'] }}</span>
                </div>
                <p class="small text-muted mb-2" style="color: #99f6e4 !important;">{{ $project['description'] }}</p>
                <small class="font-weight-bold" style="color: #2dd4bf;">View Project Details &rarr;</small>
            </a>
        </div>
    @endforeach
</div>
    </div>
</section>

        <!-- BAGIAN AKHIR: AJAKAN KOLABORASI -->
        <section class="collab-section" id="collab" style="scroll-margin-top: 100px;">
            <h3 class="font-weight-bold mb-2" style="color: #2c2523; letter-spacing: 2px;">Are you interested in collaborating?</h3>
            <p class="text-muted small mb-4">Let’s discuss how we can bring your ideas to life.</p>
            
            <a href="{{ $instagram_url }}" target="_blank" class="collab-btn-box">
                Visit My Instagram

            </a>
        </section>

    </div>

    <!-- SCRIPT GELEMBUNG EARTH TONE DENGAN EFEK DISTORSI PERGESERAN TEKSTUR -->
    <script>
        const canvas = document.getElementById('bubble-canvas');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        // WARNA GELEMBUNG EARTH TONE (Soft Sage Green, Warm Cream, Terracotta Soft, Deep Earth)
        const colors = [
            'rgba(163, 177, 138, 0.45)', // Sage Green
            'rgba(218, 210, 196, 0.50)', // Warm Paper Cream
            'rgba(188, 108, 37, 0.25)',  // Earth Terracotta Soft
            'rgba(28, 61, 39, 0.35)',    // Deep Forest Green
            'rgba(111, 126, 105, 0.35)'  // Moss Green
        ];

        class Bubble {
            constructor(x, y, radius) {
                this.x = x;
                this.y = y;
                this.radius = radius;
                this.color = colors[Math.floor(Math.random() * colors.length)];
                
                this.vx = (Math.random() - 0.5) * 1.6;
                this.vy = (Math.random() - 0.5) * 1.6;
                this.mass = radius;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                
                // GRADIENT REFRAKSI/PERGESERAN TEKSTUR KERTAS
                let gradient = ctx.createRadialGradient(
                    this.x - this.radius * 0.35, 
                    this.y - this.radius * 0.35, 
                    this.radius * 0.05, 
                    this.x + this.radius * 0.2, 
                    this.y + this.radius * 0.2, 
                    this.radius
                );
                
                // Bintik kilatan refraksi pembiasan kertas
                gradient.addColorStop(0, 'rgba(255, 255, 255, 0.75)');
                gradient.addColorStop(0.3, this.color);
                gradient.addColorStop(0.85, 'rgba(163, 147, 130, 0.2)');
                gradient.addColorStop(1, 'rgba(60, 50, 45, 0.15)');

                ctx.fillStyle = gradient;
                
                // EFEK SHADOW UNTUK TAMPILAN MENGGESER TEKSTUR BERVOLUME
                ctx.shadowColor = 'rgba(60, 50, 45, 0.12)';
                ctx.shadowBlur = 12;
                ctx.shadowOffsetX = this.vx * 3;
                ctx.shadowOffsetY = this.vy * 3;

                ctx.fill();
                ctx.closePath();

                // RESET SHADOW SUPAYA TIDAK MEMEBAL
                ctx.shadowColor = 'transparent';
            }

            update(bubbles) {
                if (this.x + this.radius > canvas.width || this.x - this.radius < 0) {
                    this.vx = -this.vx;
                }
                if (this.y + this.radius > canvas.height || this.y - this.radius < 0) {
                    this.vy = -this.vy;
                }

                for (let i = 0; i < bubbles.length; i++) {
                    if (this === bubbles[i]) continue;

                    let dx = bubbles[i].x - this.x;
                    let dy = bubbles[i].y - this.y;
                    let distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < this.radius + bubbles[i].radius) {
                        let angle = Math.atan2(dy, dx);
                        let sin = Math.sin(angle);
                        let cos = Math.cos(angle);

                        let x1 = 0;
                        let y1 = 0;
                        let x2 = dx * cos + dy * sin;
                        let y2 = dy * cos - dx * sin;

                        let vx1 = this.vx * cos + this.vy * sin;
                        let vy1 = this.vy * cos - this.vx * sin;
                        let vx2 = bubbles[i].vx * cos + bubbles[i].vy * sin;
                        let vy2 = bubbles[i].vy * cos - bubbles[i].vx * sin;

                        let vxTotal = vx1 - vx2;
                        vx1 = ((this.mass - bubbles[i].mass) * vx1 + 2 * bubbles[i].mass * vx2) / (this.mass + bubbles[i].mass);
                        vx2 = vxTotal + vx1;

                        let overlap = (this.radius + bubbles[i].radius) - distance;
                        this.x -= (overlap / 2) * cos;
                        this.y -= (overlap / 2) * sin;
                        bubbles[i].x += (overlap / 2) * cos;
                        bubbles[i].y += (overlap / 2) * sin;

                        this.vx = vx1 * cos - vy1 * sin;
                        this.vy = vy1 * cos + vx1 * sin;
                        bubbles[i].vx = vx2 * cos - vy2 * sin;
                        bubbles[i].vy = vy2 * cos + vx2 * sin;
                    }
                }

                this.x += this.vx;
                this.y += this.vy;

                this.draw();
            }
        }

        let bubbles = [];
        const numberOfBubbles = 16;

        function init() {
            bubbles = [];
            for (let i = 0; i < numberOfBubbles; i++) {
                let radius = Math.random() * 45 + 40;
                let x = Math.random() * (canvas.width - radius * 2) + radius;
                let y = Math.random() * (canvas.height - radius * 2) + radius;

                if (i !== 0) {
                    for (let j = 0; j < bubbles.length; j++) {
                        let distance = Math.sqrt(Math.pow(x - bubbles[j].x, 2) + Math.pow(y - bubbles[j].y, 2));
                        if (distance < radius + bubbles[j].radius) {
                            x = Math.random() * (canvas.width - radius * 2) + radius;
                            y = Math.random() * (canvas.height - radius * 2) + radius;
                            j = -1;
                        }
                    }
                }
                bubbles.push(new Bubble(x, y, radius));
            }
        }

        function animate() {
            requestAnimationFrame(animate);
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < bubbles.length; i++) {
                bubbles[i].update(bubbles);
            }
        }

        init();
        animate();
    </script>

</body>
</html>