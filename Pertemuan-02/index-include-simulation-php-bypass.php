<?php 
// Informasi dasar lingkungan lab SSL (dari file awal)
echo "<h1>Lab Keamanan Web & SSL Lokal</h1>";   
echo "<p>Domain Aktif: " . htmlspecialchars($_SERVER['HTTP_HOST']) . "</p>"; 
echo "<p>Port Server: " . htmlspecialchars($_SERVER['SERVER_PORT']) . "</p>"; 
echo "<p>Status Protokol: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'HTTPS (Secure)' : 'HTTP') . "</p>"; 

echo "<hr>";
echo "<h3>Simulasi Form & Parameter Testing</h3>";

// Simulasi penanganan input untuk pengujian (Misal: simulasi command/payload testing)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_input = $_POST['test_payload'] ?? '';
    
    echo "<div style='background: #f8d7da; padding: 10px; border: 1px solid #f5c6cb;'>";
    echo "<strong>[DEBUG] Payload Diterima:</strong> " . htmlspecialchars($target_input) . "<br>";
    
    // CONTOH EDUKATIF: Simulasi kerentanan eksekusi (Hanya untuk lab lokal terisolasi!)
    // Jika Anda ingin menguji perilaku eksekusi lokal secara ekstrem di lab tertutup:
    if (!empty($target_input) && isset($_GET['mode']) && $_GET['mode'] === 'unsafe_eval') {
        echo "<p style='color: red;'><strong>[!] Peringatan: Menjalankan mode evaluasi tidak aman</strong></p>";
        // PERINGATAN: Jangan pernah mengaktifkan fungsi ini di server publik/produksi!
        @eval($target_input); 
    } else {
        echo "<p>Mode aman aktif. Gunakan parameter ?mode=unsafe_eval di URL untuk simulasi eksekusi lab.</p>";
    }
    echo "</div>";
}
?>

<!-- Form sederhana untuk mengirimkan string uji / payload lokal -->
<form method="POST" action="">
    <label for="test_payload">Masukkan Payload / String Uji:</label><br>
    <input type="text" id="test_payload" name="test_payload" style="width: 400px; padding: 5px;" placeholder="Contoh: echo 'Test Exploit Berhasil';"><br><br>
    <button type="submit" style="padding: 6px 12px;">Kirim Test Payload</button>
</form>