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
            $database = new Conexao(); //nova instancia da conexao
            $db = $database->getConnection(); //tenta conectar
            
            $sql = "INSERT INTO VALUES veiculo (marca, modelo, kmInicial, kmFinal)(:marca, :modelo, :kmInicial, :kmFinal)";
            try {
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':marca', $this->marca);
                $stmt->bindParam(':modelo', $this->modelo);
                $stmt->bindParam(':kmInicial', $this->kmInicial);
                $stmt->bindParam(':kmFinal', $this->kmFinal);
                $stmt->execute();
                return true;
            } catch(PDOExeption $e) { //if(erro==true) {echo $this->mensagem;}
                echo "Erro ao inserir automóvel: " . $e->getMessage();
                return false;
            }
        }
    }

    class infoAbastecimento {

        function mandarAbastecimento() {
            $database = new Conexao(); //nova instancia da conexao
            $db = $database->getConnection(); //tenta conectar
            
            $sql = "INSERT INTO VALUES abastecimento (gasolinaTIpo, kmHodometro, precoGasolina, media, cheio)(:gasolinaTIpo, :kmHodometro, :precoGasolina, :media, :cheio)";
            try {
                $stmt = $db->prepare($sql);
    
                $stmt->bindParam(':gasolinaTipo', $this->gasolinaTipo);
                $stmt->bindParam(':kmPercorridos', $this->kmPercorridos);
                $stmt->bindParam(':precoGasolina', $this->precoGasolina);
                $stmt->bindParam(':media', $this->media);
                $stmt->bindParam(':cheio', $this->cheio);
                $stmt->execute();
                return true;
            } catch(PDOExeption $e) { //if(erro==true) {echo $this->mensagem;}
                echo "Erro ao inserir abastecimento: " . $e->getMessage();
                return false;
            }
        }
    }
?>