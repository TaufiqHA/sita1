<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KajurController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SekjurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ExcelController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'doLogin']);
});

Route::middleware(['auth', 'checkrole:3,5'])->group(function () {
    Route::get('/diterima', [JudulController::class, 'diterima'])->name('diterima');
    Route::get('/ditolak', [JudulController::class, 'ditolak'])->name('ditolak');
    Route::get('/diajukan', [JudulController::class, 'diajukan'])->name('diajukan');
    Route::get('/semua', [JudulController::class, 'semua'])->name('semua');
});

Route::middleware(['auth', 'checkrole:1,2,3,4,5'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'check']);
    Route::get('/user/{user}/edit', [UserController::class, 'edit']);
    Route::put('/user/{user}', [UserController::class, 'update']);
    Route::get('/judul1/{judul}', [JudulController::class, 'download'])->name('download');
    Route::post('/update-theme', [UserController::class, 'updateTema']);
});

Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update']);
    Route::get('/judul/create', [JudulController::class, 'create']);
    Route::post('/judul', [JudulController::class, 'store']);
    Route::get('/bimbingan/mahasiswa', [BimbinganController::class, 'index'])->name('bimbingan');
    Route::get('/room/mahasiswa/{room}', [RoomController::class, 'index'])->name('room');
    Route::post('/room/mahasiswa/{room}', [RoomController::class, 'uploadDraft'])->name('uploadDraft');
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/{dosen}', [DosenController::class, 'create'])->name('addDosen');
    Route::put('/dosen/{dosen}', [DosenController::class, 'update'])->name('updateDosen');
    Route::get('/bimbingan/dosen', [BimbinganController::class, 'indexDosen'])->name('bimbinganDosen');
    Route::get('/room/dosen/{room}', [RoomController::class, 'indexDosen'])->name('roomDosen');
    Route::get('/downloadDraft/{room}', [RoomController::class, 'download'])->name('downloadDraft');
    Route::put('/room/{room}/status', [RoomController::class, 'status'])->name('statusRoom');
    Route::put('/room/{room}/revisi', [RoomController::class, 'revisi'])->name('revisiRoom');
});

Route::middleware(['auth', 'checkrole:3'])->group(function () {
    Route::get('/kajur', [KajurController::class, 'index']);
    Route::get('/kajur/create', [KajurController::class, 'create']);
    Route::put('/kajur/{kajur}', [KajurController::class, 'update']);
    Route::put('/judul/{judul}', [JudulController::class, 'updateStatus']);
    Route::put('/updateDospem/{judul}', [JudulController::class, 'updateDospem'])->name('updateDospem');
    Route::get('/judul', [JudulController::class, 'index']);
    Route::get('/judul/{judul}', [JudulController::class, 'show'])->name('showJudul');
    Route::get('/showJudulMhs/{mahasiswa}', [JudulController::class, 'showJudulMahasiswa'])->name('showJudulMahasiswa');
    Route::get('/tugasAkhir', [KajurController::class, 'tugasAkhir'])->name('tugasAkhir');
    Route::get('/tolakJudul/{judul}', [JudulController::class, 'tolakJudul'])->name('tolakJudul');
    Route::post('/terimaJudul/{judul}', [JudulController::class, 'terimaJudul'])->name('terimaJudul');
    Route::get('/distribusiDosen', [KajurController::class, 'distribusiDosen'])->name('distribusiDosen');
});

Route::middleware(['auth', 'checkrole:4'])->group(function () {
    Route::get('/sekjur', [SekjurController::class, 'index']);
    Route::get('/sekjur/create', [SekjurController::class, 'create']);
    Route::put('/sekjur/{sekjur}', [SekjurController::class, 'update']);
});

Route::middleware(['auth', 'checkrole:5'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/excel', [ExcelController::class, 'index']);
    Route::get('/admin/judul', [AdminController::class, 'judul'])->name('admin.judul');
});
