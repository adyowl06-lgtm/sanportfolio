<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic Design, Logo & Illustration - Satria Adi Nugroho</title>
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

        /* FILTER TAB BUTTONS */
        .filter-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 40px;
        }

        .btn-filter-tab {
            background-color: rgba(232, 224, 213, 0.85);
            color: #1c3d27;
            border: 1.5px solid rgba(163, 147, 130, 0.5);
            border-radius: 30px;
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-filter-tab:hover, .btn-filter-tab.active {
            background-color: #1c3d27;
            color: #f4f0ea;
            border-color: #2d5a3c;
            box-shadow: 0 4px 15px rgba(28, 61, 39, 0.25);
        }

        /* KARTU PROYEK */
        .project-card-item {
            background: rgba(238, 231, 221, 0.85);
            border: 1.5px solid rgba(180, 165, 148, 0.5);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(60, 50, 45, 0.08);
            cursor: pointer;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .project-card-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(28, 61, 39, 0.2);
            border-color: #1c3d27;
        }
        .card-thumb {
            width: 100%;
            height: 250px;
            object-fit: contain;
            background-color: #f8f6f0;
            padding: 15px;
        }
        .card-body-custom {
            padding: 22px;
        }

        /* MODAL POP-UP STYLING */
        .modal-content-earth {
            background-color: #f4f0ea;
            border: 2px solid #1c3d27;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-earth {
            background-color: #1c3d27;
            color: #f4f0ea !important;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 24px;
            border: 1.5px solid #2d5a3c;
            transition: all 0.3s ease;
        }
        .btn-earth:hover {
            background-color: #2d5a3c;
        }

        /* STYLING PRATINJAU GAMBAR PNG DALAM MODAL */
        .modal-png-preview {
            width: 100%;
            border-radius: 12px;
            border: 1px solid rgba(163, 147, 130, 0.5);
            background-color: #ffffff;
            padding: 8px;
            margin-bottom: 12px;
            max-height: 350px;
            object-fit: contain;
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
            <h2 class="font-weight-bold mb-2" style="font-family: 'Cinzel', serif; color: #1c3d27;">Graphic Design, Logo & Illustration</h2>
            <p class="text-muted">Explore my work across logo design, branding, graphic design, and digital illustrations.</p>
        </div>

        <!-- TAB FILTER KATEGORI -->
        <div class="filter-container">
            <button class="btn-filter-tab active" data-filter="all">All Projects</button>
            <button class="btn-filter-tab" data-filter="logo">Logo & Branding</button>
            <button class="btn-filter-tab" data-filter="graphic_design">Graphic Design</button>
            <button class="btn-filter-tab" data-filter="illustration">Illustration</button>
        </div>

        <!-- DAFTAR KARTU PROYEK -->
        <div class="row" id="projectGrid">
            @foreach($design_items as $index =>$item)
                <div class="col-md-6 mb-4 project-item-col" data-category="{{ $item['category_key'] }}">
                    <div class="project-card-item" onclick="openProjectModal({{ $index }})">
                        <img src="{{ asset($item['thumbnail']) }}" alt="{{ $item['title'] }}" class="card-thumb" onerror="this.src='https://via.placeholder.com/400x250/e8dfd3/1c3d27?text=Thumbnail';">
                        <div class="card-body-custom">
                            <span class="badge" style="background-color: #a3b18a; color: #1c3d27;">{{ $item['category'] }}</span>
                            <h6 class="font-weight-bold mt-2 mb-2" style="color: #1c3d27;">{{ $item['title'] }}</h6>
                            <small class="font-weight-bold d-block mt-2" style="color: #2d5a3c; font-size: 0.85rem; letter-spacing: 0.5px;">
                                {!! ($item['type'] ?? 'pdf') === 'pdf' ? 'View PDF File &rarr;' : 'View PNG Image &rarr;' !!}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- MODAL POP-UP (Mendukung PDF & PNG Gambar Anak) -->
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-earth">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold" id="modalTitle" style="color: #1c3d27;"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-4" id="modalBody"></div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const designItems = @json($design_items);
        const baseUrl = "{{ asset('') }}"; // Menyiapkan base URL Laravel agar path file selalu benar

        // LOGIKA FILTER TAB
        $('.btn-filter-tab').on('click', function() {
            $('.btn-filter-tab').removeClass('active');$(this).addClass('active');

            const filterValue = $(this).attr('data-filter');

            if (filterValue === 'all') {
                $('.project-item-col').fadeIn(300);
            } else {
                $('.project-item-col').hide();$(`.project-item-col[data-category="${filterValue}"]`).fadeIn(300);
            }
        });

        // LOGIKA MEMBUKA MODAL
        function openProjectModal(index) {
            const item = designItems[index];
            const modalContainer = $('#modalBody');
            modalContainer.empty();

            $('#modalTitle').text(item.title);

            // DETEKSI ARRAY FILE (Mendukung 'pdf_files', 'image_files', atau 'files')
            const fileList = item.pdf_files || item.image_files || item.files || [];

            if (item.type === 'image') {
                // TAMPILAN JIKA BERKAS ADALAH GAMBAR
                modalContainer.append('<p class="mb-3 text-muted small">Enjoy!</p>');

                if (fileList.length > 0) {
                    fileList.forEach(fileObj => {
                        const fileUrl = baseUrl + fileObj.file;
                        modalContainer.append(`
                            <div class="mb-4">
                                <h6 class="font-weight-bold text-left mb-2" style="color: #1c3d27;">${fileObj.label}</h6>
                                <img src="${fileUrl}" class="modal-png-preview" alt="${fileObj.label}" onerror="this.src='https://via.placeholder.com/600x350/e8dfd3/1c3d27?text=PNG+Image+File';">
                                <a href="${fileUrl}" target="_blank" class="btn btn-earth btn-sm">
                                     Buka Gambar Ukuran Penuh
                                </a>
                            </div>
                        `);
                    });
                } else {
                    modalContainer.append('<p class="text-danger small">Tidak ada file PNG tersedia.</p>');
                }

            } else {
                // TAMPILAN JIKA BERKAS ADALAH DOKUMEN PDF
                modalContainer.append(`<p class="mb-4 text-muted small">Silakan pilih berkas PDF yang ingin dibuka:</p>`);

                if (fileList.length > 0) {
                    fileList.forEach(fileObj => {
                        const fileUrl = baseUrl + fileObj.file;
                        modalContainer.append(`
                            <a href="${fileUrl}" target="_blank" class="btn btn-earth d-block mb-3 py-2 font-weight-bold">
                                📄 ${fileObj.label}
                            </a>
                        `);
                    });
                } else {
                    modalContainer.append('<p class="text-danger small">Tidak ada file PDF tersedia.</p>');
                }
            }

            $('#projectModal').modal('show');
        }
    </script>
</body>
</html>