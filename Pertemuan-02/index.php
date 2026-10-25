<?php 
echo "<h1>Halo! Berhasil Akses Quantum SSL Lokal di test-quantum-ssl.com</h1>";   
echo "<p>Domain Aktif: " . $_SERVER['HTTP_HOST'] . "</p>"; 
echo "<p>Port Server: " . $_SERVER['SERVER_PORT'] . "</p>"; 
echo "<p>Status Protokol: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 
'on' ? 'HTTPS (Secure)' : 'HTTP') . "</p>"; 
?>