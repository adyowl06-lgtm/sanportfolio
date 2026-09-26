<?php

// 1. Buat struktur folder temporary di /tmp untuk Vercel
$storageDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Set environment path storage & cache ke /tmp
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['APP_STORAGE'] = '/tmp/storage';

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Bind jalur storage dan bootstrap cache secara eksplisit
$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

// 4. Jalankan HTTP Kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);