<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Grading Collection - Satria Adi Nugroho</title>
    <!-- Font Google Professional Earth Tone -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        /* BASE PAPERY BACKGROUND (WARM CREAM) */
        body {
            background-color: #f4f0ea;
            color: #2c2523;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* TEKSTUR KERTAS */
        .paper-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none;
            opacity: 0.35;
            background-image: radial-gradient(#a39382 0.75px, transparent 0.75px), radial-gradient(#a39382 0.75px, #f4f0ea 0.75px);
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }

        /* TOMBOL KEMBALI */
        .btn-back {
            color: #1c3d27;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            color: #2d5a3c;
            transform: translateX(-4px);
        }

        /* CARD CONTAINER UTAMA */
        .colorgrade-single-card {
            background: #1c3d27;
            border: 1.5px solid #2d5a3c;
            border-radius: 24px;
            padding: 40px 30px;
            color: #f4f0ea;
            box-shadow: 0 12px 35px rgba(28, 61, 39, 0.25);
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        /* FLEX CONTAINER GALERI FOTO */
        .gallery-flex-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            /* Menggunakan calc untuk membagi 100% lebar area menjadi 7 bagian dengan memperhitungkan jarak gap */
            gap: 12px;
            padding-top: 35px;
            padding-bottom: 20px;
            max-width: 1000px; /* Batas lebar container agar pas diisi 7 foto */
            margin: 0 auto;
        }

        /* ITEM KOTAK FOTO TERMINIMIZE */
        .photo-thumb-box {
            position: relative;
            /* Lebar persis agar muat 7 item per baris */
            width: calc((100% - (12px * 6)) / 7);
            height: 110px;
            border-radius: 16px;
            overflow: visible;
            cursor: pointer;
            border: 2px solid rgba(163, 177, 138, 0.4);
            background-color: #2d5a3c;
            z-index: 1;
            outline: none !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .photo-thumb-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 14px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        /* ANIMASI SAAT HOVER ATAU AKTIF VIA KEYBOARD (ACTIVE/FOCUS) */
        .photo-thumb-box:hover,
        .photo-thumb-box.keyboard-active {
            width: calc(((100% - (12px * 6)) / 7) * 1.5); /* Membesar menyamping tanpa merusak baris */
            height: 130px;
            border-color: #a3b18a;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            z-index: 999 !important;
        }

        /* TOOLTIP POP-UP NAMA FOTO */
        .photo-thumb-box::after {
            content: attr(data-title);
            position: absolute;
            bottom: 115%;
            left: 50%;
            transform: translateX(-50%) translateY(6px);
            background-color: #f4f0ea;
            color: #1c3d27;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            white-space: nowrap;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(163, 177, 138, 0.6);

            opacity: 0;
            visibility: hidden;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: 1000 !important;
        }

        /* SEGITIGA PANAH TOOLTIP */
        .photo-thumb-box::before {
            content: '';
            position: absolute;
            bottom: 102%;
            left: 50%;
            transform: translateX(-50%) translateY(6px);
            border-width: 6px;
            border-style: solid;
            border-color: #f4f0ea transparent transparent transparent;
            
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: 1000 !important;
        }

        /* MUNCULKAN TOOLTIP SAAT HOVER ATAU AKTIF VIA KEYBOARD */
        .photo-thumb-box:hover::after,
        .photo-thumb-box:hover::before,
        .photo-thumb-box.keyboard-active::after,
        .photo-thumb-box.keyboard-active::before {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        /* MODAL POP-UP UNTUK PRATINJAU FOTO BESAR */
        .modal-content-earth {
            background-color: #f4f0ea;
            border: 2px solid #1c3d27;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            color: #2c2523;
        }

        .preview-img-full {
            width: 100%;
            max-height: 70vh;
            object-fit: contain;
            border-radius: 12px;
            background-color: #1c3d27;
        }
    </style>
</head>
<body>

    <!-- OVERLAY TEKSTUR KERTAS -->
    <div class="paper-overlay"></div>

    <div class="container py-5">
        <!-- TOMBOL KEMBALI -->
        <div class="text-left mb-4">
            <a href="{{ route('portfolio.home') }}" class="btn-back">&larr; Back to Portfolio</a>
        </div>

        <div class="text-center mb-4">
            <h2 class="font-weight-bold mb-2" style="font-family: 'Cinzel', serif; color: #1c3d27;">Color Grading Showcase</h2>
            <p class="text-muted mb-1">Hover over any image or use <kbd>&larr;</kbd> <kbd>&rarr;</kbd> <kbd>&uarr;</kbd> <kbd>&darr;</kbd> arrow keys to navigate.</p>
            <small class="text-muted">Press <kbd>Enter</kbd> or <kbd>Space</kbd> to open full view.</small>
        </div>

        <!-- CARD TUNGGAL UNTUK SEMUA KUMPULAN FOTO COLOR GRADING -->
        <div class="colorgrade-single-card text-center">
            <h4 class="font-weight-bold mb-2" style="color: #f4f0ea; letter-spacing: 2px;">
                {{ $colorgrade_data['title'] }}
            </h4>
            <p class="small mb-4" style="color: #a3b18a;">
                {{ $colorgrade_data['description'] }}
            </p>

            <!-- CONTAINER KUMPULAN FOTO GALERI -->
            <div class="gallery-flex-wrapper" id="galleryWrapper">
                @foreach($colorgrade_data['photos'] as $index => $photo)
                    <div class="photo-thumb-box" 
                         tabindex="0"
                         data-index="{{ $index }}"
                         data-title="{{ $photo['title'] }} — {{ $photo['before_after'] }}"
                         onclick="openFullImage('{{ asset($photo['image']) }}', '{{ $photo['title'] }}', '{{ $photo['before_after'] }}')">
                        <img src="{{ asset($photo['image']) }}" 
                             alt="{{ $photo['title'] }}"
                             onerror="this.src='https://via.placeholder.com/220x140/2d5a3c/f4f0ea?text=Photo+{{ $index + 1 }}';">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- MODAL POP-UP UNTUK MELIHAT FOTO UKURAN FULL -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-earth">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title font-weight-bold" id="modalPhotoTitle" style="color: #1c3d27;"></h5>
                        <small class="text-muted" id="modalPhotoSub"></small>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-4">
                    <img src="" id="fullPreviewImage" class="preview-img-full" alt="Color Grading Preview">
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentIndex = -1;
        const items = $('.photo-thumb-box');
        const totalItems = items.length;

        function updateFocus(newIndex) {
            if (newIndex < 0 || newIndex >= totalItems) return;

            // Hapus status aktif dari item sebelumnya
            items.removeClass('keyboard-active');

            currentIndex = newIndex;
            const targetItem = $(items[currentIndex]);

            // Tambahkan class aktif & jalankan scroll otomatis jika di luar layar
            targetItem.addClass('keyboard-active');
            targetItem[0].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        // FUNGSI LOGIKA PERHITUNGAN BARIS (COLUMNS) SECARA DINAMIS
        function getItemsPerRow() {
            if (totalItems === 0) return 1;
            const firstTop = $(items[0]).offset().top;
            let count = 0;
            items.each(function() {
                if (Math.abs($(this).offset().top - firstTop) < 15) {
                    count++;
                }
            });
            return count || 1;
        }

        // LISTEN EVENT TOMBOL KEYBOARD
        $(document).on('keydown', function(e) {
            // Abaikan navigasi keyboard jika Modal Pop-Up sedang terbuka
            if ($('#imagePreviewModal').hasClass('show')) return;

            const itemsPerRow = getItemsPerRow();

            switch (e.which) {
                case 37: // Panah Kanan / Left Arrow
                    e.preventDefault();
                    if (currentIndex === -1) updateFocus(0);
                    else updateFocus(Math.max(0, currentIndex - 1));
                    break;

                case 39: // Panah Kanan / Right Arrow
                    e.preventDefault();
                    if (currentIndex === -1) updateFocus(0);
                    else updateFocus(Math.min(totalItems - 1, currentIndex + 1));
                    break;

                case 38: // Panah Atas / Up Arrow
                    e.preventDefault();
                    if (currentIndex === -1) updateFocus(0);
                    else updateFocus(Math.max(0, currentIndex - itemsPerRow));
                    break;

                case 40: // Panah Bawah / Down Arrow
                    e.preventDefault();
                    if (currentIndex === -1) updateFocus(0);
                    else updateFocus(Math.min(totalItems - 1, currentIndex + itemsPerRow));
                    break;

                case 13: // Enter
                case 32: // Spacebar
                    if (currentIndex >= 0 && currentIndex < totalItems) {
                        e.preventDefault();
                        $(items[currentIndex]).trigger('click');
                    }
                    break;
            }
        });

        // KETIKA MOUSE MENG-HOVER FOTO, SINKRONKAN INDEX KEYBOARD
        items.on('mouseenter', function() {
            items.removeClass('keyboard-active');
            currentIndex = $(this).data('index');
        });

        // BUKA MODAL FULL IMAGE
        function openFullImage(imgSrc, title, sub) {
            $('#fullPreviewImage').attr('src', imgSrc);
            $('#modalPhotoTitle').text(title);
            $('#modalPhotoSub').text(sub);
            $('#imagePreviewModal').modal('show');
        }
    </script>
</body>
</html>