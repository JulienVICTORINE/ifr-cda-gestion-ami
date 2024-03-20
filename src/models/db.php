<?php

namespace App\Models;

use PDO;

class Db {

    private string $db;
    private string $user;
    private string $password;
    private string $host;
    private int $port;

    public function __construct()
    {
        $this->db = $_ENV["DATABASE"];
        $this->user = $_ENV["DATABASE_USER"];
        $this->password = $_ENV["DATABASE_PASSWORD"];
        $this->host = $_ENV["DATABASE_HOST"] ?? "127.0.0.1";
        $this->port = $_ENV["DATABASE_PORT"] ?? 3306;
    }

    public function getPDO(): PDO {
        return new PDO("mysql:dbname={$this->db};host={$this->host};port={$this->port}",$this->user,$this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}