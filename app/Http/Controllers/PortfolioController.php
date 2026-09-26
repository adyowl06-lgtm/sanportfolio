<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $software_list = [
            ['name' => 'ibisPaint', 'file' => 'ibispaint', 'level' => 85],
            ['name' => 'Affinity',  'file' => 'affinity',  'level' => 85],
            ['name' => 'Photoshop', 'file' => 'photoshop', 'level' => 65],
            ['name' => 'CapCut',    'file' => 'capcut',    'level' => 90],
            ['name' => 'Snapseed',  'file' => 'snapseed',  'level' => 90],
            ['name' => 'Lightroom', 'file' => 'lightroom', 'level' => 85],
            ['name' => 'Canva',     'file' => 'canva',     'level' => 95],
            ['name' => 'VS Code',   'file' => 'vscode',    'level' => 80],
            ['name' => 'Figma',     'file' => 'figma',     'level' => 75],
        ];

        // Ekstensi gambar yang didukung
        $extensions = ['png', 'jpg', 'jpeg', 'webp', 'PNG', 'JPG', 'JPEG', 'WEBP'];
        $softwares = [];

        foreach ($software_list as $sw) {
            $icon_path = 'images/software/default.png'; // Gambar cadangan jika file tidak ditemukan

            // Pengecekan otomatis ekstensi file gambar
            foreach ($extensions as $ext) {
                $check_path = 'images/software/' . $sw['file'] . '.' . $ext;
                if (file_exists(public_path($check_path))) {
                    $icon_path = $check_path;
                    break;
                }
            }

            // Simpan nama, icon, dan level ke dalam array $softwares
            $softwares[] = [
                'name'  => $sw['name'],
                'icon'  => $icon_path,
                'level' => $sw['level'] // <--- Mengirimkan level ke View
            ];
        }

        $projects = [
            [
                'title' => 'Graphic Design, Logo & Illustration',
                'category' => 'Design & Illustration',
                'description' => 'A collection of graphic design, logo, and digital illustration projects.',
                'route_name' => 'project.design'
            ],
            [
                'title' => 'Video Editing & Motion Graphics',
                'category' => 'Video & Motion',
                'description' => 'A collection of video editing, visual composition, and motion graphics projects.',
                'route_name' => 'project.video'
            ],
            [
                'title' => 'Color Grading & Film Look',
                'category' => 'Color Grading',
                'description' => 'A collection of experiments in photo and video color grading, mood tones, and LUT presets.',
                'route_name' => 'project.colorgrade'
            ],
        ];

        $instagram_url = "https://instagram.com/strrch_";

        return view('portfolio', compact('softwares', 'projects', 'instagram_url'));
    }

    // Method Halaman Desain & Ilustrasi
// Method Halaman Desain & Ilustrasi
    public function designProject()
    {
        $design_items = [
            [
                'title'        => 'Banten Province 26th Anniversary Logo Design Competition',
                'category'     => 'Branding & Logo',
                'category_key' => 'logo', // Key untuk filter
                'type'         => 'pdf',
                'thumbnail'    => 'storage/images/projects/banten.jpg',
                'pdf_files'    => [
                    ['label' => 'Banten Logo Concept 1', 'file' => 'storage/pdf/banten1.pdf'],
                    ['label' => 'Banten Logo Concept 2', 'file' => 'storage/pdf/banten2.pdf'],
                ]
            ],
            [
                'title'        => 'Klaten Regency 222th Anniversary Logo Design Competition',
                'category'     => 'Branding & Logo',
                'category_key' => 'logo',
                'type'         => 'pdf',
                'thumbnail'    => 'storage/images/projects/kla.png',
                'pdf_files'    => [
                    ['label' => 'Klaten Logo Concept', 'file' => 'storage/pdf/kla.pdf'],
                ]
            ],
            [
                'title'        => 'Kadin Indonesia 58th Anniversary Logo Design Competition',
                'category'     => 'Branding & Logo',
                'category_key' => 'logo',
                'type'         => 'pdf',
                'thumbnail'    => 'storage/images/projects/kad.png',
                'pdf_files'    => [
                    ['label' => 'Kadin Logo Concept', 'file' => 'storage/pdf/kad.pdf'],
                ]
            ],
            [
                'title'        => 'USIP Logo Design Competition — Universitas Islam Pemalang',
                'category'     => 'Branding & Logo',
                'category_key' => 'logo',
                'type'         => 'pdf',
                'thumbnail'    => 'storage/images/projects/usip.png',
                'pdf_files'    => [
                    ['label' => 'USIP Logo Concept', 'file' => 'storage/pdf/usip.pdf'],
                ]
            ],
            // Contoh Tambahan untuk Graphic Design (Bisa ditambah nanti)
            [
                'title'        => 'Social Media Event LKBB Prasaja 2',
                'category'     => 'Graphic Design',
                'category_key' => 'graphic_design',
                'type'         => 'image', // Indikator jenis berkas PNG / Gambar
                'thumbnail'    => 'storage/images/projects/LKBBprasaja2.png',
                'files'        => [
                    ['label' => 'H-7 Technical Meeting Poster', 'file' => 'storage/images/projects/7.jpeg'],
                    ['label' => 'H-3 Technical Meeting Poster', 'file' => 'storage/images/projects/3.jpeg'],
                    ['label' => 'H-1 Technical Meeting Poster', 'file' => 'storage/images/projects/1.jpeg'],
                    ['label' => 'Template for Information Prasaja', 'file' => 'storage/images/projects/templateinformasi.jpeg'],
                ]
            ],
            [
                'title'        => 'Free Fire Graph',
                'category'     => 'Graphic Design',
                'category_key' => 'graphic_design',
                'type'         => 'image', // Indikator jenis berkas PNG / Gambar
                'thumbnail'    => 'storage/images/projects/Garena_Logo.png',
                'files'        => [
                    ['label' => '1', 'file' => 'storage/images/projects/f1.jpeg'],
                    ['label' => '2', 'file' => 'storage/images/projects/f2.jpeg'],
                    ['label' => '3', 'file' => 'storage/images/projects/f3.png'],
                    ['label' => '4', 'file' => 'storage/images/projects/f4.jpeg'],
                    ['label' => '5', 'file' => 'storage/images/projects/f5.jpeg'],
                    ['label' => '6', 'file' => 'storage/images/projects/f6.jpeg'],
                ]
            ],
            // Contoh Tambahan untuk Illustration (Bisa ditambah nanti)
            [
                'title'        => 'Illustration Event LKBB Prasaja 2',
                'category'     => 'Illustration',
                'category_key' => 'illustration',
                'type'         => 'image',
                'thumbnail'    => 'storage/images/projects/LKBBprasaja2.png',
                'files'    => [
                    ['label' => 'Frame for Activity Prasaja', 'file' => 'storage/images/projects/frameprasaja.png'],
                ]
            ],
        ];

        return view('projects.design', compact('design_items'));
    }

    // Method Halaman Video & Motion
    public function videoProject()
{
    // Daftar Proyek Video/Motion (Array Multidimensi)
    $video_items = [
        [
            'title' => 'Video H-7 Event LKBB Prasaja 2',
            'category' => 'Motion',
            'description' => 'Collaboration with Malaka EO',
            'type' => 'Video',
            'video_file' => 'videos/H-7 LKBB PRASAJA 2.mp4'
        ],
        [
            'title' => 'Video H-3 Event LKBB Prasaja 2',
            'category' => 'Video',
            'description' => 'Collaboration with Malaka EO',
            'type' => 'video',
            'video_file' => 'videos/H-3 LKBB PRASAJA 2.mp4'
        ],
        [
            'title' => 'Video H-1 Event LKBB Prasaja 2',
            'category' => 'Video',
            'description' => 'Collaboration with Malaka EO',
            'type' => 'video',
            'video_file' => 'videos/H-1 LKBB PRASAJA 2.mp4'
        ],
        [
            'title' => 'Video Motion Graphic & Editing',
            'category' => 'Motion',
            'description' => 'Collaboration with Malaka EO',
            'type' => 'video',
            'video_file' => 'videos/Motion_LKBB_Prasaja_2.mov'
        ]
    ]; // <--- Tanda penutup array dan titik koma berada di sini

    return view('projects.video', compact('video_items'));
}
    // METHOD BARU 1: Halaman Color Grading
    // Method Halaman Color Grading
    public function colorgradeProject()
    {
        $colorgrade_data = [
            'title'       => 'Color Grading & Photography Collection',
            'category'    => 'Color Grading',
            'description' => 'Kumpulan eksplorasi warna, tone preset, dan penyelarasan visual fotografi.',
            // Daftar kumpulan foto karya color grading Anda
            'photos'      => [
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/1.png',
                    'before_after' => 'Vol. 1'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/2.png',
                    'before_after' => 'Vol. 2'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/3.png',
                    'before_after' => 'Vol. 3'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/4.png',
                    'before_after' => 'Vol. 4'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/5.png',
                    'before_after' => 'Vol. 5'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/6.png',
                    'before_after' => 'Vol. 6'
                ],
                [
                    'title'     => 'PLightroom Editing',
                    'image'     => 'storage/images/colorgrade/7.png',
                    'before_after' => 'Vol. 7'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/8.png',
                    'before_after' => 'Vol. 8'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/9.png',
                    'before_after' => 'Vol. 9'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/10.png',
                    'before_after' => 'Vol. 10'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/11.png',
                    'before_after' => 'Vol. 11'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/12.png',
                    'before_after' => 'Vol. 12'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/13.png',
                    'before_after' => 'Vol. 13'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/14.png',
                    'before_after' => 'Vol. 14'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/15.png',
                    'before_after' => 'Vol. 15'
                ],
                [
                    'title'     => 'Lightroom Editing',
                    'image'     => 'storage/images/colorgrade/16.png',
                    'before_after' => 'Vol. 16'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/17.png',
                    'before_after' => 'Vol. 1'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/18.png',
                    'before_after' => 'Vol. 2'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/19.png',
                    'before_after' => 'Vol. 3'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/21.png',
                    'before_after' => 'Vol. 4'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/22.png',
                    'before_after' => 'Vol. 5'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/23.png',
                    'before_after' => 'Vol. 6'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/24.png',
                    'before_after' => 'Vol. 7'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/25.png',
                    'before_after' => 'Vol. 8'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/26.png',
                    'before_after' => 'Vol. 9'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/27.png',
                    'before_after' => 'Vol. 10'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/28.png',
                    'before_after' => 'Vol. 11'
                ],
                [
                    'title'     => 'Snapseed Editing',
                    'image'     => 'storage/images/colorgrade/29.png',
                    'before_after' => 'Vol. 12'
                ],
            ]
        ];

        return view('projects.colorgrade', compact('colorgrade_data'));
    }
}