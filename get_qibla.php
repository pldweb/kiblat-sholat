<?php
header('Content-Type: application/json');

// Ambil latitude dan longitude dari parameter GET
$latitude = isset($_GET['latitude']) ? $_GET['latitude'] : null;
$longitude = isset($_GET['longitude']) ? $_GET['longitude'] : null;

// Periksa apakah latitude dan longitude disediakan
if ($latitude === null || $longitude === null) {
    echo json_encode(['error' => 'Latitude and longitude not provided']);
    exit;
}

// URL untuk API Aladhan dengan latitude dan longitude
$url = "http://api.aladhan.com/v1/qibla/$latitude/$longitude";

// Mengambil data dari API
$response = file_get_contents($url);
if ($response === FALSE) {
    echo json_encode(['error' => 'Gagal mengambil data dari API']);
    exit;
}

// Kembalikan respons dari API ke klien
echo $response;
?>
