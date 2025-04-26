<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'sistema_veiculos');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_EMULATE_PREPARES => false 
        ]
    );
} catch (PDOException $e) {
    if ($_SERVER['SERVER_NAME'] === 'localhost') {
        die(json_encode(["erro" => "Erro na conexão", "detalhes" => $e->getMessage()]));
    } else {
        die(json_encode(["erro" => "Erro na conexão ao banco de dados."]));
    }
}
?>