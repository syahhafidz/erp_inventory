<?php
// Memulai sesi
session_start();

// Membuat random string untuk CAPTCHA
$captcha_string = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6);

// Menyimpan CAPTCHA di session
$_SESSION['captcha'] = $captcha_string;

// Menentukan lebar dan tinggi gambar CAPTCHA
$width = 120;
$height = 40;

// Membuat gambar baru dengan lebar dan tinggi yang telah ditentukan
$image = imagecreatetruecolor($width, $height);

// Membuat warna latar belakang (putih)
$background_color = imagecolorallocate($image, 255, 255, 255);

// Membuat warna teks (hitam)
$text_color = imagecolorallocate($image, 0, 0, 0);

// Menggambar string CAPTCHA pada gambar
imagestring($image, 5, 25, 12, $captcha_string, $text_color);

// Mengatur header untuk menampilkan gambar sebagai gambar PNG
header('Content-type: image/png');

// Menampilkan gambar CAPTCHA
imagepng($image);

// Menghapus gambar dari memori
imagedestroy($image);
?>
