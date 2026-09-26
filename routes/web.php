<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PortfolioController@index')->name('portfolio.home');

// Route Baru Halaman Proyek
Route::get('/project/design', 'PortfolioController@designProject')->name('project.design');
Route::get('/project/video', 'PortfolioController@videoProject')->name('project.video');
// Route Proyek Tambahan (Color Grade & Photo Manipulation)
Route::get('/project/colorgrade', 'PortfolioController@colorgradeProject')->name('project.colorgrade');