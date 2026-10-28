<?php

class Cliente{
    public $id;
    public $nome;
    public $telefone;
    public $email;
    public $cpf;

    public $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }

    public function create(){
        $query = "INSERT INTO cliente( nome, telefone, email, cpf) values (:nome, :telefone, :email, :cpf)";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':cpf',$this->cpf);

        $stmt->execute();
    }
};
?>