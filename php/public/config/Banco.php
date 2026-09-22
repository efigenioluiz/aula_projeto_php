<?php

class Banco {
    private $host = "mysql";
    private $usuario = "root";
    private $senha = "root";
    private $porta = 3306;
    private $banco = "aula_db";
    private $conexao;

    public function conectar() {
        try {
            $dsn = "mysql:host={$this->host};port={$this->porta};dbname={$this->banco};charset=utf8mb4";

            $this->conexao = new PDO(
                $dsn,
                $this->usuario,
                $this->senha
            );

            $this->conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $this->conexao;

        } catch (PDOException $e) {
            die("Erro ao conectar com o banco: " . $e->getMessage());
        }
    }
}
