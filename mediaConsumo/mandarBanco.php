<?php

    /*function listaPessoas() {
        $database = new Conexao(); //nova instancia da conexao
        $db = $database->getConnection(); //tenta conectar

        $sql = "Select * from pessoa";

        try {
            $stmt = $db->query($sql);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC); //rs = result -> resultado  ::::: fetchAll == ecncapsula realizando o processo concatenativo em todos os itens/objetos presentes no ambiente
            return $rs;
        } catch(PDOExeption $e) {
            echo 'Erro ao listar pessoas: ' . $e->getMessage();
            $rs = [];
            return $rs;
        }
    }*/
    
    include "conexao.class.php";
    class cadastroVeiculo {


        function inserirVeiculo() {
            
        }
    }

    class infoAbastecimento {

        function mandarAbastecimento() {
            
        }
    }
?>