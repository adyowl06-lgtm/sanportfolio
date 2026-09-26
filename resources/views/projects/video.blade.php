<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Video & Motion - Satria Adi Nugroho</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #f4f0ea; 
            color: #2c2523; 
            font-family: 'Poppins', sans-serif; 
        }
        .btn-back { 
            color: #1c3d27; 
            font-weight: 600; 
            text-decoration: none !important; 
        }
        
        /* CARD ITEM STYLING */
        .project-card-item {
            background: #ffffff;
            border: 1.5px solid rgba(163, 147, 130, 0.3);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(60, 50, 45, 0.12);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .project-card-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(28, 61, 39, 0.25);
            border-color: #1c3d27;
        }

        /* PEMUTAR VIDEO PLAYER HTML5 */
        .card-video-player {
            width: 100%;
            height: 280px;
            object-fit: cover;
            background-color: #000000;
            border-bottom: 1.5px solid rgba(163, 147, 130, 0.3);
        }

        .card-body-custom {
            padding: 20px 25px;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <a href="{{ route('portfolio.home') }}" class="btn-back mb-4 d-inline-block">&larr; Back to Portfolio</a>
        
        <h2 class="font-weight-bold mb-2" style="font-family: 'Cinzel', serif; color: #1c3d27;">Video Editing & Motion Graphics</h2>
        <p class="text-muted mb-5">Watch the video and motion graphics projects below.</p>

        <!-- GRID KARTU PROYEK VIDEO -->
        <div class="row">
            @foreach($video_items as $item)
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="project-card-item">
                        
                        <!-- PEMUTAR VIDEO LANGSUNG DI WEB -->
                        <video class="card-video-player" controls preload="metadata">
                            <source src="{{ asset($item['video_file']) }}" type="video/mp4">
                           Your browser does not support HTML5 video playback.
                        </video>

                        <!-- INFORMASI DETAIL PROYEK -->
                        <div class="card-body-custom">
                            <span class="badge" style="background-color: #a3b18a; color: #1c3d27;">{{ $item['category'] }}</span>
                            <h5 class="font-weight-bold mt-2 mb-1" style="color: #1c3d27;">{{ $item['title'] }}</h5>
                            <p class="small text-muted mb-0">{{ $item['description'] }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>